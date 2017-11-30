<?php namespace App\Commands\Forum;

use App\Commands\Command;

use App\Models\Forum;
use App\Commands\Activity\CreateActivity;
use Bus;

class Subscribe extends Command  {

	protected $forum;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Forum $forum)
	{
		$this->forum = $forum;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$forum = $this->forum;
		$forum->subscribers()->attach(auth()->user()->id);
		Bus::dispatch(new CreateActivity([
			'from_url' => '/community/forums/'.$forum->channel_route.'/'.$forum->id.'/'.str_slug($forum->title),
			'message' => 'subscribed to a forum',
			'data_id' => $forum->id,
		]));
		return $forum;
	}

}
