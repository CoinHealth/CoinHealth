<?php namespace App\Commands;

use App\Commands\Command;

use Bus;

use App\Commands\GetPlansCommand;
use App\Commands\GetPUFCommand;
class GetMonthlyPremium extends Command  {

	private $applicants;
	private $options;
	private $slcsp;
	private $puf;
	private $forSubsidy;
	public function __construct($applicants, $options = null, $slcsp = null, $puf = null, $forSubsidy = false)
	{
		$this->applicants = $applicants;
		$this->options = $options;
		$this->slcsp = $slcsp;
		$this->puf = $puf;
		$this->forSubsidy = $forSubsidy;
	}

	public function handle()
	{
		$slcsp = $this->slcsp;
		$puf = $this->puf;

		if (!$slcsp && $this->options && !$puf) {
			// $select = [
			// 	'$select' => 'premium_adult_individual_age_21',
			// ];
			// $plans = Bus::dispatch(new GetPlansCommand(array_merge($this->options, $select)));
			$plans = Bus::dispatch(new GetPlansCommand($this->options)); // NOTE:310 for state base error;
			$slcsp = count($plans) && count($plans) > 1 ? $plans[1] : $plans[0] ? : null;
			$pufuckingf = Bus::dispatch(new GetPUFCommand([
				'ratingareaid' => $this->options['rating_area'],
				// 'location_1_state' => $this->options['state_code'],
				'statecode' => $this->options['state_code'],
			]));
			$puf = $this->searchPUF($pufuckingf, 'planid', $slcsp['plan_id_standard_component']);
		}
		$monthlyPremium = 0;
		$applicants = $this->applicants;
		foreach($applicants as $applicant) {

			if ($applicant['subsidy']) {

				$age = $applicant['applicantAge'];
				if ($age >= 21 && $age < 64) {
					$age_value = session()->get('ages_'.$age, function() use ($age) {
						return \App\Age::find($age)->value;
					});
				}
				else if ($age < 21) {
					$age_value = session()->get('ages_20', function() {
						return \App\Age::find(20)->value;
					});
				}
				else if ($age >= 64) {
					$age_value = session()->get('ages_64', function() {
						return \App\Age::find(64)->value;
					});
				}
				$rate = 0;
				if ($this->forSubsidy) {
					if ($applicant['applicantJob'] === 'false') {
						$rate = $applicant['applicantTobacco'] === 'false' ? $slcsp['premium_adult_individual_age_21'] : $puf['individualtobaccorate'];
					}
				}
				else {
					$rate = $applicant['applicantTobacco'] === 'false' ? $slcsp['premium_adult_individual_age_21'] : $puf['individualtobaccorate'];
				}
				$monthlyPremium += $rate * $age_value;
			}
		}
		return $monthlyPremium;
	}

	function searchPUF($pufs, $field, $value)
	{
		foreach($pufs as $key => $product)
		{
			if ( $product[$field] === $value )
				return $product;
		}
		return null;
	}

}
