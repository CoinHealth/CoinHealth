<?php

namespace App\Http\Controllers\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use App\Models\ChatReply;
use App\Models\Attachment;
use App\Http\Requests\Messages\SendReply as SendReplyRequest;
use App\Http\Requests\Messages\NewMessage;
use App\Http\Requests\Messages\SendInviteRequest;
use App\Events\Messages\MessageWasSent;
use App\Events\Messages\NewChatWasCreated;
use App\Events\Messages\NewUserWasInvited;
use App\Events\Messages\UserWasRemoved;
use Image;
use DB;
use Storage;
use Ramsey\Uuid\Uuid;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $chats = $user->chats();
        if ($chats->count()) {
            $recentChat = $chats->first();
            return redirect('/team-builder/'.$recentChat->id);
        }
        return view('messages.index');
    }

    public function latestChat($id, Chat $chat)
    {
        $chat = $this->getChats()->find($id);
        if ($chat) {
            return view('messages.index')->with([
                'chat' => $chat,
            ]);
        }
        return redirect('/team-builder');
    }

    public function toggleJoin($id)
    {
        // toggle user to join the chat.
        $user = auth()->user();
        $chat = $user->chats()->find($id);
        $userChat = $chat->participants()->find($user->id);

        $userChat->pivot->has_joined = !$userChat->pivot->has_joined;
        $userChat->pivot->save();
        $userChat->save();
        return response()->json([
            'chat' => $userChat,
        ]);
    }

    public function searchUser(Request $request)
    {
        $qry = $request->input('query');
        $user = auth()->user();
        $users = User::where(function($q) use ($qry) {
            $q->where('first_name','like', $qry."%")
                ->orWhere('last_name', 'like', $qry."%")
                ->orWhere(DB::raw('concat_ws(" ", first_name,last_name)') , 'like', "%".$qry."%");
            })->select([
                'id',
                'first_name',
                'last_name',
                'role',
            ]);

        if ($user->role == 1) 
            $users->where('role', '<>', 1);

        $users->where('id','<>',$user->id);

        return response()->json([
            "hits" => $users->count(),
            "data" => $users->get(),
        ]);
        
    }

    public function invite($id, SendInviteRequest $request)
    {
        $user = auth()->user();
        $invitedUsers = $request->get('users');
        $chat = $user->chats()->find($id);
        $newParticipants = [];

        foreach($invitedUsers as $invitedUser) {
            if (!$chat->participants->contains($invitedUser['id'])) {
                $chat->participants()->attach([
                    $invitedUser['id'] => [
                        'has_joined' => false,
                    ],
                ]);
                array_push($newParticipants, $invitedUser['id']);
            }
        }

        if (count($newParticipants)) {
            // broadcast an NewUserWasInvited
            foreach($newParticipants as $participantId) {
                $participant = User::find($participantId);

                broadcast(new NewUserWasInvited($participant,$user,$chat))
                        ->toOthers();
            }
        }

        return response()->json([
            'success' => boolval(count($newParticipants)),
            'count' => count($newParticipants),
        ]);
    }

    public function remove($id, Request $request)
    {
        $user = auth()->user();
        $participant = User::find($request->get('participant_id'));
        $chat = $participant->chats()->find($id);
        $detach = $chat->participants()->detach($participant->id);
        broadcast(new UserWasRemoved($participant, $chat, $user))->toOthers();
        return response()->json([
            'success' => $detach,
        ]);
    }

    public function getMessages($id, Request $request)
    {
        $chats = $this->getChats();
        $count = $chats->count();
        $user = auth()->user();
        $conversations = $count ? $chats->with([
                'participants',
                'user'
            ])->get() : [];
        $data = [
            'conversations' => $conversations,
            'conversation' => $count ? $chats->find($id)
                                        ->load(['replies', 'attachments', 'patient']) :
                                        null,
        ];
        return response()->json($data);
    }

    public function postNewMessage(NewMessage $request)
    {
        $user = auth()->user();
        $data = array_merge($request->except(['inputSearch']), [
            'user_id' => $user->id
        ]);

        array_push($data['users'], $user->id);
        $data['users'] = array_unique($data['users']);

        $chat = Chat::create([
            'id' => Uuid::uuid4()->toString(),
            'chat_type' => 1,
            'user_id' => $data['user_id']
        ]);

        foreach($data['users'] as $userId) {
            $attachData = [
                'has_joined' => $data['user_id'] == $userId
            ];
            $chat->participants()->attach($userId, $attachData);
        }

        $attachments = isset($data['attachments']) ? $data['attachments'] : [];

        if ($data['message'] || count($attachments)) {
            if (count($attachments))
                $data['has_attachments'] = true;

            $reply = $chat->replies()->create($data);
            $reply->load('user');

            /**
             * save Attachments
             */
            if (count($attachments))
                $this->saveAttachments($reply, $attachments);
        }

        broadcast(new NewChatWasCreated($chat))->toOthers();

        return response()->json([
            'is_new' => $chat->wasRecentlyCreated,
            'chat' => $chat->load([
                'user',
                'participants',
                'replies'
            ]),
        ]);
    }

    public function postMessage($id, Request $request)
    {
        $user = auth()->user();
        $chat = $user->chats()->find($id);
        
        $data = array_merge($request->except(['inputSearch']), [
            'user_id' => $user->id
        ]);

        $attachments = isset($data['attachments']) ? $data['attachments'] :[];

        /**
         * Check if reply has Attachments
         */
        if (count($attachments)) {
            $data['has_attachments'] = true;
        }

        /**
        * save ChatReply.
        */
        $reply = $chat->replies()->create($data);
        $reply->load('user');
        

        /**
         * save Attachments
         */
        if (count($attachments))
            $this->saveAttachments($reply, $attachments);

        broadcast(new MessageWasSent($reply))->toOthers();
        return response()->json($reply);
    }

    private function saveAttachments(ChatReply $reply, $attachments)
    {
        $dest = '/uploads/messages/';
        if (!\App::environment('local')) {
            $dest = 'uploads/messages/';
        }
        foreach($attachments as $file) {
            $mime = $file->getClientMimeType();
            $ext = $file->getClientOriginalExtension();
            $rnd = date('Y-m-d-H-i-s') . uniqid();

            // check if the mime type is Image
            $isImage = boolval(strstr($mime, "image/"));
            if ($isImage) {
                $img = Image::make($file);

                $imgBig = clone $img;
                $imgSmall = clone $img;

                $imgBig->resize(200, null, function($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path($dest.$rnd.'-big.'.$ext));
                $imgSmall->resize(100, null, function($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path($dest.$rnd.'-small.'.$ext));
                $img->save(public_path($dest.$rnd.'.'.$ext));
                $path = 'messages/'.$rnd.'.'.$ext;
            }
            else {
                $path = $file->storeAs('messages', $rnd.'.'.$ext);
            }

            $attachment = Attachment::create([
                'user_id' => $reply->user_id,
                'title' => $file->getClientOriginalName(),
                'path' => "/uploads/{$path}",
                'mime_type' => $mime,
                'file_type' => 3
            ]);
            $reply->attachments()->save($attachment);
        }
    }

    private function getChats()
    {
        $user = auth()->user();
        $chats = $user->chats();
        return $chats;
    }
}
