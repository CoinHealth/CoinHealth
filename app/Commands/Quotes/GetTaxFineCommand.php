<?php namespace App\Commands\Quotes;

use App\Commands\Command;


class GetTaxFineCommand extends Command  {

	private $applicants;
	private $income;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($applicants, $income)
	{
		$this->applicants = $applicants;
		$this->income = $income;
	}

	public function handle()
	{
		$tax = 0;
		$income = $this->income * 1;
		$rate1 = $income * 0.025;
		$rate2 = 0;
		// ==============================================================================================
		// | NOTE:30 and TODO nababago yung tax rate per year kaya it should be dynamically called from db |
		// ==============================================================================================
		foreach($this->applicants as $applicant) {
			$rate2 += $applicant['applicantAge'] > 18 ? 695 : (695/2);
		}
		return max($rate1, $rate2 > 2085 ? 2085 : $rate2);
	}
}
