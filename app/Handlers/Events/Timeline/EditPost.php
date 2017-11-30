<?php namespace App\Handlers\Events\Timeline;

use App\Events\Timeline\PostWasUpdated;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Pusher;
class EditPost {

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
	* @param  PostWasUpdated  $event
	* @return void
	*/
	public function handle(PostWasUpdated $event)
	{
		$pusher = $this->pusher;
		$pusher->trigger('timeline_channel', 'timeline_update_post', $event);
	}

}
