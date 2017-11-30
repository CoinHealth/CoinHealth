<?php namespace App\Events\Timeline;

use App\Events\Event;
use App\Models\ReplyTimeline;

use Illuminate\Queue\SerializesModels;

class ReplyWasCreated extends Event {

	use SerializesModels;

	public $reply;
	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(ReplyTimeline $reply)
	{
		$this->reply =  $reply;
	}

}
