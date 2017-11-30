<?php namespace App\Commands\Timeline;

use App\Commands\Command;
use App\Models\Timeline;
use App\Events\Timeline\PostWasCreated;

use Illuminate\Http\Request;

class CreatePost extends Command  {

	private $request;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	/**
	 * Execute the command.
	 * return Timeline
	 * @return Timeline Model
	 */
	public function handle(Timeline $timeline)
	{
		$data = $this->request->except('_token');
		$user = auth()->user();
		// $data['data_id'] = null;
		$data['user_id'] = $user->id;
		$timeline = $timeline->create($data);
		$timeline->user;
		$timeline->replies;
		event(new PostWasCreated($timeline));
		return $timeline;
	}

}
