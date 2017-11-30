<?php namespace App\Http\Controllers\Profile;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Commands\Messages\NewThread;
use App\Commands\Messages\SendReply;
use Hashids\Hashids;
use App\Http\Requests\SendMessageRequest;
//events
use App\Events\CreatedNewThread;
class MessageController extends Controller {

	private $hash;

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex()
	{
		$thread = auth()->user()->threads()->first();
		if ($thread)
			return redirect('/profile/messages/'.$thread->hashed_id);

		return view('main.profile2.message')->with([
			'thread' => $thread,
			'threads' => auth()->user()->threads,
		]);
	}

	public function getNew()
	{
		$data = [
			'base' => 'new',
			'threads' => auth()->user()->threads()->paginate(20),
		];
		return view('main.profile2.message')->with($data);
	}

	public function postNew(Request $request)
	{
		$reply = $this->dispatch(new NewThread($request, auth()->user()));
		if($reply) {
			event(new CreatedNewThread(auth()->user()));
			$thread = auth()->user()->threads()->first();
			return redirect('/profile/messages/'.$thread->hashed_id);
		}
		return redirect('/profile/messages');
	}

	public function show($id = null)
	{
		$hash = $this->hash;
		$threads = auth()->user()->threads();

		if (!$id)
			return redirect('/profile/messages/'.$threads->first()->hashed_id);
		// dd($threads->get());
		$id = $hash->decode($id)[0];
		$data = [
			'threads' => $threads->paginate(20),
			'thread' => $threads->where('pair_id',$id)->first(),
		];
		// dd($data['threads']->first()->otherCollaborators->first());
		return view('main.profile2.message')->with($data);
	}

	public function postReply(Request $request)
	{
		$data = $request->all();
		$data['user_id'] = auth()->user()->id;
		$reply = $this->dispatch(new SendReply($data, false));
		return redirect()->back();

	}
}
