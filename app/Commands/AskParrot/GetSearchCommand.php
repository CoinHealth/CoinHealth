<?php namespace App\Commands\AskParrot;

use App\Commands\Command;


class GetSearchCommand extends Command  {

	protected $keyword;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($keyword)
	{
		$this->keyword = $keyword;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		dd($this->keyword);
	}

	public function getView()
	{
		return $view;
	}


}
