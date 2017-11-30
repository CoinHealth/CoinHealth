<?php namespace App\Commands\Messages;

use App\Commands\Command;

use App\Thread;
class AddMessageCollaborator extends Command  {

	private $user;
	private $thread;

	public function __construct($user, $thread)
	{
		$this->user = $user;
		$this->thread = $thread;
	}

	public function handle()
	{
		$user = $this->user * 1;
		$thread = $this->thread;
		return $thread->collaborators()->attach($user);
	}

}
