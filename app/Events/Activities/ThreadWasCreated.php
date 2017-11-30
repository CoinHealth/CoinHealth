<?php namespace App\Events\Activities;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;
use App\Models\Activity;
class ThreadWasCreated extends Event {

	use SerializesModels;

	public $activity;
	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(Activity $activity)
	{
		$this->activity = $activity;
	}
}
