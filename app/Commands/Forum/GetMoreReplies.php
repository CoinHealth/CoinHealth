<?php namespace App\Commands\Forum;

use App\Commands\Command;


class GetMoreReplies extends Command  {

	protected $topic;
	protected $nextPageUrl;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($topic, $nextPageUrl)
	{
		$this->topic = $topic;
		$this->nextPageUrl = $nextPageUrl;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		return dd($this->topic->posts()->comments()->paginate(1)->nextPageUrl());
	}

}
