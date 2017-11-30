<?php namespace App\Commands\Blog;

use App\Commands\Command;

use App\Models\Blog;
class Vote extends Command  {

	private $data;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($vote)
	{
		$this->data = $vote;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(Blog $blog)
	{
		$_blog = $blog->find($this->data['news_id']);
		$vote = $this->data['vote'];
		$user = auth()->user();
		if ($vote == 0) {
			$_blog->vote()->detach($user);
		}
		else {
			$voter = $_blog->vote()->find($user->id);
			if (!$voter)
				$_blog->vote()->attach($user);
			else {
				$_blog->vote()->updateExistingPivot($user->id , [
					'votes' => $vote,
				]);
			}
		}
		return $_blog;
	}

}
