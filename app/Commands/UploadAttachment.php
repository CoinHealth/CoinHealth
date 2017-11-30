<?php namespace App\Commands;

use App\Commands\Command;

use App\Models\Attachment;
class UploadAttachment extends Command  {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */

	private $attachment;
	private $userId;

	public function __construct($attachment, $userId)
	{
		$this->attachment = $attachment;
		$this->userId = $userId;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$file = $this->attachment;
		$destinationPath = public_path() . '/uploads/attachments/';
		$ext = $file->getClientOriginalExtension();
		$rnd = date('Y-m-d-H-i-s') . uniqid();
		$upload_file = $rnd .'.'. $ext;
		$success = $file->move($destinationPath, $upload_file);
		if ($success) {
			$attachment = Attachment::create([
				'user_id' => $this->userId,
				'title' => $file->getClientOriginalName(),
				'path' => '/uploads/attachments/'.$upload_file,
				'mime_type' => $file->getClientMimeType(),
			]);
			return $attachment;
		}
	}

}
