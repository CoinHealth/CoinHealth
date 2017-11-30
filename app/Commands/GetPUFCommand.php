<?php namespace App\Commands;

use App\Commands\Command;

use allejo\Socrata\SoqlQuery;
use allejo\Socrata\SodaClient;
use allejo\Socrata\SodaDataset;
use App\Traits\SocrataTrait;

class GetPUFCommand extends Command  {
	use SocrataTrait;

	private $options;

	public function __construct($options)
	{
		$this->options = $options;
	}

	public function handle()
	{
		$client = new SodaClient('data.healthcare.gov', env('SOCRATA_APP_TOKEN', 'eYyNyO698mepvhux2NPFXXYVA'), 'careparrotadvisors@gmail.com', 'Advisorscareparr0t');
		$dataset = new SodaDataset($client, "g6jh-z9d4");
		$sosql = new SoqlQuery();

		$qry = $this->urlencode(array_merge($this->options, [
			'tobacco' => 'Tobacco User/Non-Tobacco User',
			'$select' => 'individualtobaccorate,planid',
			'age' => '21',
		]));
		// $pufs = $socrata->get('nj3k-wd8h', array_merge($this->options, [ // 2017 PUF
		// g6jh-z9d4 // 2016 PUF
		return $dataset->getDataset($sosql);
	}

}
