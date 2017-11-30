<?php namespace App\Handlers\Events;

use App\Events\Activities\ThreadWasCreated;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Pusher;
class NotifyProfile {

	protected $pusher;
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
	 * @param  ThreadWasCreated  $event
	 * @return void
	 */
	public function handle(ThreadWasCreated $event)
	{
		$pusher = $this->pusher;
		$pusher->trigger('profile_channel', 'notify', $event);
	}

}
