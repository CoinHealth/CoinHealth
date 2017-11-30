<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Queue\SerializesModels;
class GetFPLCommand extends Command  {

	use SerializesModels;


	private $household_size;
	private $income;
	private $subsidy;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($household_size, $income, \App\Models\Subsidy $subsidy)
	{
		$this->household_size = $household_size;
		$this->income = $income;
		$this->subsidy = $subsidy;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$subsidy = $this->subsidy;
		$size = $this->household_size;
		$base_fpl = $subsidy->getBaseFPL($size * 1);
		$fpl_percentage = ($this->income / ($base_fpl ) * 100);
		return [
			'fpl_percentage' => round($fpl_percentage, 2),
			'amount' => $base_fpl,
			'nice_amount' => '$'.number_format($base_fpl),
		];
	}

}
