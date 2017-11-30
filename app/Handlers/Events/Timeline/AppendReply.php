<?php namespace App\Handlers\Events\Timeline;

use App\Events\Timeline\ReplyWasCreated;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Pusher;
class AppendReply {

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
	 * @param  ReplyWasCreated  $event
	 * @return void
	 */
	public function handle(ReplyWasCreated $event)
	{
		$pusher = $this->pusher;
		$pusher->trigger('timeline_channel', 'timeline_reply_created', $event);
	}

}
