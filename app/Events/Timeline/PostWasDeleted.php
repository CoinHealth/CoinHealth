<?php namespace App\Events\Timeline;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class PostWasDeleted extends Event {

	use SerializesModels;
	public $success;
	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($success)
	{
		$this->success = $success;
	}

}
