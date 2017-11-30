<?php namespace App\Commands;

use App\Commands\Command;


class GetLocationsCommand extends Command  {

	private $zip_code;
	private $group;

	public function __construct($zip_code, $group = false)
	{
		$this->zip_code = $zip_code;
		$this->group = $group;
	}

	public function handle()
	{
		$locations = \App\Models\Location::where('zip_code', 'like', $this->zip_code . '%')
											->take(20)
											->orderBy('zip_code', 'ASC');
		if ($this->group) {
			$locations = $locations->groupBy('county');
		}
		return $locations->get();
	}

}
