<?php namespace App\Commands;

use App\Commands\Command;


class HasSmoker extends Command  {

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
		$smoker = false;
		$applicants = $this->applicants;
		foreach($applicants as $applicant) {
			if (!$smoker)
				$smoker = $applicant['applicantTobacco'];
		}
		return $smoker;
	}

}
