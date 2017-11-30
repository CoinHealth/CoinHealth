<?php namespace App\Commands;

use App\Commands\Command;


class CheckFamilyCommand extends Command  {

	private $applicants;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($applicants)
	{
		$this->applicants = $applicants;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$household_size = 0;
		foreach($this->applicants as $applicant) {
			$household_size += $applicant['subsidy'] ? 1 : 0;
		}
		return $household_size > 2;
	}

}
