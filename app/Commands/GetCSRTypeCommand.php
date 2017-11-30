<?php namespace App\Commands;

use App\Commands\Command;


class GetCSRTypeCommand extends Command  {

	private $fpl_percentage;

	public function __construct($fpl_percentage)
	{
		$this->fpl_percentage;
	}


	public function handle()
	{
		$fpl_percentage = $this->fpl_percentage;
		if ($fpl_percentage >= 100 && $fpl_percentage <= 150)
			return 'csr94';
		else if ($fpl_percentage > 150 && $fpl_percentage <= 200)
			return 'csr87';
		else if ($fpl_percentage > 200 && $fpl_percentage <= 250)
			return 'csr73';
		else if ($fpl_percentage > 250) {
			return 'csr70';
		}
		return '';
	}

}
