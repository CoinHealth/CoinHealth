<?php namespace App\Commands;

use App\Commands\Command;

use App\Models\HealthcareProvider;
class AddDoctor extends Command   {

	private $request;

	public function __construct($request)
	{
		$this->request = $request;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$data = $this->request->except('_token');
		$provider = HealthcareProvider::create($data);
		return $provider;
	}

}
