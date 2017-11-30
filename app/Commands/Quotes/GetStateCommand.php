<?php namespace App\Commands\Quotes;

use App\Commands\Command;
use App\Commands\Quotes\GetFPLCommand;


class GetStateCommand extends Command  {

	private $subsidy;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(\App\Models\Subsidy $subsidy)
	{
		$this->subsidy = $subsidy;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		return [
			'pretty_name' => $this->subsidy->location->pretty_name,
			'state_abbr' => $this->subsidy->location->state_abbr,
			'city' => $this->subsidy->location->city
		];
	}

}
