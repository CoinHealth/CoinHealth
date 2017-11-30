<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class UserCreatedNewTopic extends Event {

	use SerializesModels;

	public $user;

	public function __construct(\App\Models\User $user)
	{
		$this->user = $user;
	}

}
