<?php namespace App\Commands\Timeline;

use App\Commands\Command;

use App\Models\Timeline as TimelineModel;
use App\Events\Timeline\PostWasDeleted;
class DeletePost extends Command  {

	private $id;
	public function __construct($id)
	{
		$this->id = $id;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(TimelineModel $timeline)
	{
		$success = $timeline->find($this->id)->delete();
		event(new PostWasDeleted($success));
		return [
			'success' => $success,
		];
	}

}
