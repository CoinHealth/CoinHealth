<?php namespace App\Commands\Messages;

use App\Commands\Command;

use App\Models\Reply;
use Bus;
use App\Commands\AddAttachmentToReply;
use App\Commands\UploadAttachment;
class SendReply extends Command  {

	private $request;
	private $fromThread;
	public function __construct($request, $fromThread = true)
	{
		$this->request = $request;
		$this->fromThread = $fromThread;
	}

	public function handle()
	{

		$data = $this->request;
		$reply = Reply::create($data);
		if (!$this->fromThread) {
			$user_mentioned = isset($data['user_mentioned']) ? $data['user_mentioned'] : [];

			$existing_collabs = $reply->thread->collaborators()->select('user_id')->get()->lists('user_id');
			$all_collabs = array_unique(array_merge($user_mentioned, $existing_collabs));
			$_final_users = array_diff($all_collabs, $existing_collabs);
			foreach($_final_users as $_collab) {
				Bus::dispatch(new AddMessageCollaborator($_collab, $reply->thread));
			}
		}

		if (isset($data['attachedImages']) && !empty($data['attachedImages']) ) {
			foreach($data['attachedImages'] as $attachmentId) {
				if ($attachmentId)
					Bus::dispatch(new AddAttachmentToReply($attachmentId, $reply, $data['user_id'] ));
			}
		}
		if (isset($data['attachments']) && !empty($data['attachments']) ) {
			foreach ($data['attachments'] as $attachment) {

				if ($attachment) {
					$image = Bus::dispatch(new UploadAttachment($attachment, $data['user_id']));
					if ($image)
						Bus::dispatch(new AddAttachmentToReply($image->id, $reply, $data['user_id'] ));
				}
			}
		};
		return $reply;
	}

}
