<?php namespace App\Handlers\Events\Timeline;

use App\Events\Timeline\PostWasUpvoted;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Pusher;
class UpvotePost {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	private $pusher;

 	public function __construct()
 	{
 		$options = [
 			'encrypted' => true
 		];
 		$this->pusher = new Pusher(
 			config('services.pusher.app_key'),
 			config('services.pusher.app_secret'),
 			config('services.pusher.app_id'),
 			$options
 		);
 	}

	/**
	 * Handle the event.
	 *
	 * @param  PostWasUpvoted  $event
	 * @return void
	 */
	public function handle(PostWasUpvoted $event)
	{
		$pusher = $this->pusher;
		$pusher->trigger('timeline_channel-'.$event->timeline->id, 'timeline_update_votes', $event);
	}

}
