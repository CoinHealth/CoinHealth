<?php namespace App\Commands\Messages;

use App\Commands\Command;

use App\Models\Thread;
use Bus;
use App\Commands\Messages\SendReply;
use App\Commands\Messages\AddMessageCollaborator;
class NewThread extends Command  {

	private $request;
	private $authed;
	public function __construct($request, $authed)
	{
		$this->request = $request;
		$this->authed = $authed;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$request = $this->request;
		$user = $this->authed;

		if ($request->has('to_id')) {
			$data = $request->except(['_token']);
			$data['user_id'] = $user->id;
			$thread = Thread::create($data);
			$thread->pair_id = $thread->id;
			$thread->save();

			$user_mentioned = $request->has('user_mentioned') ? $data['user_mentioned'] : [];
			array_push($user_mentioned, $data['to_id'], $data['user_id']);
			$final_users = array_unique($user_mentioned);
			foreach($final_users as $collab) {
				Bus::dispatch(new AddMessageCollaborator($collab, $thread));
			}

			$_reply = [
				'thread_id' => $thread->id,
				'message' => $data['message'],
				'attachments' => $data['attachments'],
				'user_id' => $user->id,
			];
			if (isset($data['attachedImages'])) {
				$_reply['attachedImages'] = $data['attachedImages'];
			}
			$reply = Bus::dispatch(new SendReply($_reply));
			return $reply;
		}
	}

}
