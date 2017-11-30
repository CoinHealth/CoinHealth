<?php namespace App\Events\Timeline;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;
use App\Models\Timeline as TimelineModel;
class PostWasUpvoted extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public $timeline;
	public function __construct(TimelineModel $timeline)
	{
		$this->timeline = $timeline;
	}

}
