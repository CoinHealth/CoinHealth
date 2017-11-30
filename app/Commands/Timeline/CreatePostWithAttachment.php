<?php namespace App\Commands\Timeline;

use App\Commands\Command;
use App\Models\Timeline as TimelineModel;


class CreatePostWithAttachment extends Command  {

	private $desc;

	public function __construct($desc)
	{
		$this->desc = $desc;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(TimelineModel $timeline )
	{
		$desc = $this->desc;
		$user = auth()->user();
		$data['user_id'] = $user->id;
		$data['description'] = $desc;
		$timeline = $timeline->create($data);
		$timeline->user;
		$timeline->replies;

		return $timeline;

	}

}
