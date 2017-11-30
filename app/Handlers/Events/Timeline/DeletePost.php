<?php namespace App\Handlers\Events\Timeline;

use App\Events\Timeline\PostWasDeleted;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Pusher;
class DeletePost {

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
	 * @param  PostWasDeleted  $event
	 * @return void
	 */
	public function handle(PostWasDeleted $event)
	{
		$pusher = $this->pusher;
		$pusher->trigger('timeline_channel', 'timeline_delete_post', $event);
	}

}
