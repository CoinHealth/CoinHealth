<?php namespace App\Commands;

use App\Commands\Command;
use App\Commands\GetMonthlyPremium;

use Bus;
class GetSubsidyCommand extends Command  {

	private $fpl;
	private $income;
	private $slcsp;
	private $subsidy;
	public function __construct($fpl, $income, $slcsp, $subsidy)
	{
		$this->fpl = $fpl;
		$this->income = $income;
		$this->slcsp = $slcsp;
		$this->subsidy = $subsidy;
	}

	public function handle()
	{
		$fpl_percentage = round($this->fpl);
		$income = $this->income * 1;
		$slcsp = $this->slcsp;
		$subsidy = $this->subsidy;
		$_subsidy = 0;
		$status = [];
		$ptc = 0;

		if ($fpl_percentage >= 100 && $fpl_percentage <= 400) {
			$status = [
				'code' => 1,
				'message' => 'Eligible'
			];
			if ($fpl_percentage <= 132) {
				$tax = \App\Tax::find(132);
			}
			else if ($fpl_percentage < 300 && $fpl_percentage > 132) {
				$tax = \App\Tax::find($fpl_percentage);
			}
			else if ($fpl_percentage >= 300) {
				$tax = \App\Tax::find(300);
			}
			$rate = ($income / 12) * $tax->tax_limit;
			$rate = round($rate);
			$ptc = $rate;
			$_subsidy = $rate < $slcsp ? $slcsp-$rate : 0;
		}
		else if ($fpl_percentage < 100) {
			$status = [
				'code' => 2,
				'message' => 'Income Too Low',
			];
		}
		else if ($fpl_percentage > 400) {
			$status = [
				'code' => 3,
				'message' => 'Income Too High',
			];
		}


		return [
			'status' => $status,
			'subsidy' => $_subsidy,
			'ptc' => $ptc,
		];
	}


}
