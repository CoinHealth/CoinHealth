<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Queue\SerializesModels;

class CheckEligibilityCommand extends Command  {

	use SerializesModels;

	private $applicants;
	private $fpl;
	private $state_abbr;

	public function __construct($applicants, $fpl, $state_abbr, \App\Subsidy $subsidy)
	{
		$this->applicants = $applicants;
		$this->fpl = $fpl;
		$this->state_abbr = $state_abbr;
		$this->subsidy = $subsidy;
	}

	public function handle()
	{
		$applicants = $this->applicants;
		$fpl_percentage = $this->fpl;
		$fpl_rate = $fpl_percentage * 0.01;
		$state_abbr = $this->state_abbr;
		$subsidy = $this->subsidy;
		$_applicants = [];
		foreach($applicants as $applicant) {
			$age = $applicant['applicantAge'];
			$pregnant = $applicant['applicantPregnant'];
			$tobacco = $applicant['applicantTobacco'];
			$parent = $applicant['applicantParent'];
			$job = $applicant['applicantJob'];

			// set attributes to false
			$applicant['medicaid'] = false;
			$applicant['chip'] = false;
			$applicant['medicare'] = false;
			$applicant['subsidy'] = false;
			if ($age < 18) {

				if ($age >= 0 && $age <= 1) {

					if ($fpl_rate <= $subsidy->age_0_to_1_medicaid_funded) {
						$applicant['medicaid'] = true;
						$applicant['chip'] = true;
					}
					else if ($fpl_rate <= $subsidy->age_0_to_1_chip_funded && $fpl_rate >= $subsidy->age_0_to_1_medicaid_funded) {
						$applicant['chip'] = true;
					}
					else if ($fpl_rate <= $subsidy->separate_chip && ($fpl_rate >= $subsidy->age_0_to_1_medicaid_funded && $fpl_rate >= $subsidy->age_0_to_1_chip_funded) ) {
						$applicant['chip'] = true;
					}
					// age > 0 and age <= 1
				}
				else if ($age >= 1 && $age <= 5) {
					if ($fpl_rate <= $subsidy->age_1_to_5_medicaid_funded) {
						$applicant['medicaid'] = true;
						$applicant['chip'] = true;
					}
					else if ($fpl_rate <= $subsidy->age_1_to_5_chip_funded && $fpl_rate >= $subsidy->age_1_to_5_medicaid_funded) {
						$applicant['chip'] = true;
					}
					else if ($fpl_rate <= $subsidy->separate_chip && ($fpl_rate >= $subsidy->age_1_to_5_medicaid_funded && $fpl_rate >= $subsidy->age_1_to_5_chip_funded) ) {
						$applicant['chip'] = true;
					}
					// age >= 1 and age <= 5
				}
				else if ($age >= 6 && $age <= 18) {

					if ($fpl_rate <= $subsidy->age_6_to_18_medicaid_funded) {
						$applicant['medicaid'] = true;
						$applicant['chip'] = true;
					}
					else if ($fpl_rate <= $subsidy->age_6_to_18_chip_funded && $fpl_rate >= $subsidy->age_6_to_18_medicaid_funded) {
						$applicant['chip'] = true;
					}
					else if ($fpl_rate <= $subsidy->separate_chip && ($fpl_rate >= $subsidy->age_6_to_18_medicaid_funded && $fpl_rate >= $subsidy->age_6_to_18_chip_funded) ) {
						$applicant['chip'] = true;
					}
				}

			}
			else if ($age > 18) {
				if ($parent) {
					// parents
					if ($fpl_rate < $subsidy->adults_parents ) {
						$applicant['medicaid'] = true;
					}
				}
				else {
					// other adults
					if ($fpl_rate < $subsidy->other_adults) {
						$applicant['medicaid'] = true;
					}
				}
			}

			if (!$applicant['medicaid'] && !$applicant['medicare'] && !$applicant['chip']) {
					$applicant['subsidy'] = true;
					// FIXME:170 mejo mali pa yung algo
			}
			array_push($_applicants, $applicant);

		}
		return $_applicants;
	}

}
