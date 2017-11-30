<?php namespace App\Commands\News;

use App\Commands\Command;

use App\Models\News;
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
	public function handle(News $news)
	{
		$_news = $news->find($this->data['news_id']);
		$vote = $this->data['vote'];
		$user = auth()->user();
		if ($vote == 0) {
			$_news->vote()->detach($user);
		}
		else {
			$voter = $_news->vote()->find($user->id);
			if (!$voter)
				$_news->vote()->attach($user);
			else {
				$_news->vote()->updateExistingPivot($user->id , [
					'votes' => $vote,
				]);
			}
		}
		return $_news;
	}

}
