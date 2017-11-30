<?php namespace App\Commands\Timeline;

use App\Commands\Command;
use App\Http\Requests\Timeline\EditPost as EditPostRequest;
use App\Models\Timeline as TimelineModel;
use App\Events\Timeline\PostWasUpdated;


class EditPost extends Command  {

	private $request;

	public function __construct(EditPostRequest $request)
	{
		$this->request = $request;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(TimelineModel $timeline)
	{
		$data = $this->request->except(['_token', '_method']);

		$timeline = $timeline->find($data['timeline_id']);
		$timeline->update([
			'description' => $data['description'],
		]);
		event(new PostWasUpdated($timeline));
		return $timeline;
	}

}
