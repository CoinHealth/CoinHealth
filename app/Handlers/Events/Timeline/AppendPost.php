<?php namespace App\Handlers\Events\Timeline;

use App\Events\Timeline\PostWasCreated;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Pusher;
class AppendPost {

	private $pusher;
	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
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
	 * @param  PostWasCreated  $event
	 * @return void
	 */
	public function handle(PostWasCreated $event)
	{
		$pusher = $this->pusher;
		$pusher->trigger('timeline_channel', 'timeline_post_created', $event);
	}

}
