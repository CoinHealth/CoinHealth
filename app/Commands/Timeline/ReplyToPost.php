<?php namespace App\Commands\Timeline;

use App\Commands\Command;
use App\Http\Requests\Timeline\ReplyTimelineRequest;
use App\Models\ReplyTimeline;
use App\Events\Timeline\ReplyWasCreated;
use App\Models\Timeline as TimelineModel;
class ReplyToPost extends Command  {

	private $timeline;
	private $request;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(TimelineModel $timeline, ReplyTimelineRequest $request)
	{
		$this->timeline = $timeline;
		$this->request = $request;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(ReplyTimeline $reply)
	{
		$timeline = $this->timeline;
		$data = $this->request->except('_token');
		$data['user_id'] = auth()->user()->id;
		$data['timeline_id'] = $timeline->id;
		$reply = $reply->create($data);
		$reply->user;
		event(new ReplyWasCreated($reply));
		return $reply;

	}

}
