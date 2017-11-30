<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Queue\SerializesModels;
use allejo\Socrata\SodaClient;
use allejo\Socrata\SodaDataset;
use allejo\Socrata\SoqlQuery;
use App\Traits\SocrataTrait;
class GetPlansCommand extends Command  {
	use SocrataTrait;
	private $options;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($options)
	{
		$this->options = $options;
	}

	public function handle()
	{
		// $plans = $socrata->get('enx3-h2qp', $this->options);
		// $plans = $socrata->get('tuq4-d2ra', $this->options);
		// $socrata = new \Socrata("data.healthcare.gov", env('SOCRATA_APP_TOKEN', 'eYyNyO698mepvhux2NPFXXYVA'), 'careparrotadvisors@gmail.com', 'Advisorscareparr0t');
		$client = new SodaClient('data.healthcare.gov', env('SOCRATA_APP_TOKEN', 'eYyNyO698mepvhux2NPFXXYVA'), 'careparrotadvisors@gmail.com', 'Advisorscareparr0t');
		$dataset = new SodaDataset($client, "tuq4-d2ra");
		$sosql = new SoqlQuery();
		$sosql->where($this->where($this->options))
				->order($this->order($this->options));
		return ($dataset->getDataset($sosql));
	}
}
