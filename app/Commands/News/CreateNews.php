<?php namespace App\Commands\News;

use App\Commands\Command;

use App\News;
class CreateNews extends Command  {

	private $request;

	public function __construct($request)
	{
		$this->request = $request;
	}

	public function handle(News $news)
	{
		$data = $this->request->except('_token');
		$data['user_id'] = auth()->user()->id;
		$news = $news->create($data);
		return $news;
	}

}
