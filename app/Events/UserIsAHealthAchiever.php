<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class UserIsAHealthAchiever extends Event {

	use SerializesModels;

	public $user;
	public $health;
	public $answer;

	public function __construct(\App\User $user, \App\Health $health, $answer)
	{
		$this->user = $user;
		$this->health = $health;
		$this->answer = $answer;
	}

}
