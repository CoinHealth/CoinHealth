<?php namespace App\Commands\Forum;

use App\Commands\Command;

use App\Models\Forum;
use App\Commands\Forum\Subscribe;
use App\Commands\Activity\CreateActivity;
use App\Commands\News\CreateNews;
use App\Events\Activities\ThreadWasCreated;
use Bus;
class CreateTopic extends Command  {

	private $request;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($request)
	{
		$this->request = $request;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(Forum $forum)
	{
		$data = $this->request->except('_token');
		$data['user_id'] = auth()->user()->id;
		$data['channel_route'] = get_channel_route($data['channel']);

		$forum = $forum->create($data);

		if ($this->request->has('share')) {
			$news = Bus::dispatch(new CreateNews($this->request));
		}

		$activity = Bus::dispatch(new CreateActivity([
			'from_url' => '/community/forums/'.$forum->channel_route.'/'.$forum->id.'/'.str_slug($forum->title),
			'message' => 'created a forum',
			'data_id' => $forum->id,
		]));
		Bus::dispatch(new Subscribe($forum));
		event(new ThreadWasCreated($activity));
		return $forum;
	}

}
