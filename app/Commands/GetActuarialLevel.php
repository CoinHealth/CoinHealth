<?php namespace App\Commands;

use App\Commands\Command;


class GetActuarialLevel extends Command  {

	private $fpl;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($fpl)
	{
		$this->fpl = $fpl;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$fpl = round($this->fpl);
		$csr = '70%';
		if ($fpl >= 201 && $fpl <= 250)
			$csr = '73%';
		else if ($fpl >= 151 && $fpl <= 200)
			$csr = '87%';
		else if ($fpl > 100 && $fpl <= 150)
			$csr = '94%';
		return $csr;
	}

}
