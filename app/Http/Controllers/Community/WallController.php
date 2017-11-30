<?php namespace App\Http\Controllers\Community;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Timeline;
use App\Commands\Timeline\CreatePostWithAttachment;
use App\Commands\Timeline\VoteTimeline;
use App\Events\Timeline\PostWasCreated;
use App\Events\Timeline\PostAttachedWasCreated;
use App\Models\User;
use App\Models\Attachment;

use Illuminate\Http\Request;
use Hashids\Hashids;

class WallController extends Controller {

	public function getIndex()
	{
		$data = [
			'posts' => Timeline::latest()->paginate(20),
			'users' => User::latest()->paginate(30),
		];
		// y04nVjgOvE = cp salt hashed checking authentication
		return view('main.community.wall')->with($data);
	}

	public function post(Request $request, Attachment $attachment)
	{
		$timeline = $this->dispatch(new CreatePostWithAttachment($request->input('description')));
		$destinationPath = public_path() . '/uploads/attachments/';
		$attachments = $request->file('attachments');
		foreach($attachments as $file) {
			$ext = $file->getClientOriginalExtension();
			$rnd = date('Y-m-d-H-i-s') . uniqid();
			$upload_file = $rnd .'.'. $ext;
			$success = $file->move($destinationPath, $upload_file);
			if ($success) {
				$attachment->create([
					'user_id' => auth()->user()->id,
					'title' => $file->getClientOriginalName(),
					'path' => '/uploads/attachments/'.$upload_file,
					'mime_type' => $file->getClientMimeType(),
					'data_id' => $timeline->id,
					'data_model' => 'App\Timeline',
				]);
			}
		}
		$timeline->attachments;
		// event(new PostAttachedWasCreated($timeline));
		event(new PostWasCreated($timeline));
		return $timeline;
	}

	public function postVote(Request $request)
	{
		$vote = $this->dispatch(new VoteTimeline($request->except('_token')));
		return $vote;
	}
}
