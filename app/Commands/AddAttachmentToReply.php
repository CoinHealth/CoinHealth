<?php namespace App\Commands;

use App\Commands\Command;

class AddAttachmentToReply extends Command {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */

	private $image;
	private $reply;
	private $user;

	public function __construct($image, $reply, $user)
	{
		$this->image = $image;
		$this->reply = $reply;
		$this->user = $user;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$reply = $this->reply;
		$reply->attachments()->attach([
			$this->image => [
				'user_id' => $this->user,
				'permission' => true,
			],
		]);
	}

}
