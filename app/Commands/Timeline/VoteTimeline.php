<?php namespace App\Commands\Timeline;

use App\Commands\Command;
use App\Models\Timeline as TimelineModel;
use App\Events\Timeline\PostWasUpvoted;


class VoteTimeline extends Command  {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */

	private $data;

	public function __construct($data)
	{
		$this->data = $data;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(TimelineModel $timeline)
	{
		$data = $this->data;
		$vote = $data['vote'] == 'true' ? true : false;
		$data['vote'] = $vote;
		$timeline = $timeline->find($data['timeline_id']);
		$user = auth()->user();
		// return $timeline->votes;
		if ($timeline->votes->contains($user)) {
			$exist = $timeline->votes()->find($user->id);
			if ($exist->pivot->is_upvoted == $vote) {
				$timeline->votes()->detach($user);
			}
			$timeline->updateVote($user, $vote);
		}
		else {
			$timeline->postVote($user, $vote);
		}
		event(new PostWasUpvoted($timeline));
	}

}
