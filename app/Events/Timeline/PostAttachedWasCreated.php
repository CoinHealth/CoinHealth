<?php namespace App\Events\Timeline;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;
use App\Models\Timeline as TimelineModel;
class PostAttachedWasCreated extends Event {

	use SerializesModels;

	public $timeline;
	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(TimelineModel $timeline)
	{
		$this->timeline = $timeline;
	}

}
