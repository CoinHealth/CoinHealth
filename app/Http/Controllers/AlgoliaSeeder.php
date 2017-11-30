<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\BrandedMedications;
use App\Models\Symptom;
use App\Models\Medication;
use App\Models\MedicalFacility;
use App\Models\MedicalDoctor;
use App\Models\Provider;
use App\Models\Condition;

use Illuminate\Http\Request;
use AlgoliaSearch\Client;

class AlgoliaSeeder extends Controller {

	protected $client;

	public function __construct()
	{
		$this->client = new Client(env('ALGOLIA_ID'), env('ALGOLIA_ADMIN_KEY'));
	}

	public function clearAllIndex(Request $request)
	{
		if ($request->has('model')) {
			$model = app("App\\".$request->input('model'));
			$model::clearIndices();
		}
		else {
			Condition::clearIndices();
			MedicalDoctor::clearIndices();
			MedicalFacility::clearIndices();
			Medication::clearIndices();
			Symptom::clearIndices();
			BrandedMedications::clearIndices();
			Specialization::clearIndices();
		}
	}

	public function seedAllIndex()
	{
		$response = $this->algoliaSync(Condition::all(), 'healthSymptoms');
		$response = $this->algoliaSync(MedicalDoctor::all(), 'specializations');
		$response = $this->algoliaSync(MedicalFacility::all());
		$response = $this->algoliaSync(Medication::all(), 'brandedMedications');
		$response = $this->algoliaSync(Symptom::all(), 'possibleConditions');
		$response = $this->algoliaSync(BrandedMedications::all(), 'genericMedication');
		$response = $this->algoliaSync(Specialization::all(), 'specializable');
		return response()->json($response);
	}

	public function setSettings()
	{
		Condition::setSettings();

		MedicalDoctor::setSettings();

		MedicalFacility::setSettings();

		Medication::setSettings();

		Symptom::setSettings();

		return response()->json([
			'status' => 'OK',
		]);

	}

	public function conditions()
	{
		$response = $this->algoliaSync(Condition::all(), 'healthSymptoms');
		Condition::setSettings();
		return response()->json($response);
	}

	public function doctors()
	{
		$response = $this->algoliaSync(MedicalDoctor::all(), 'specializations');
		MedicalDoctor::setSettings();
		return response()->json($response);
	}

	public function facilities()
	{
		$response = $this->algoliaSync(MedicalFacility::all());
		MedicalFacility::setSettings();
		return response()->json($response);
	}

	public function medications()
	{
		$response = $this->algoliaSync(Medication::all(), 'brandedMedications');
		Medication::setSettings();
		return response()->json($response);
	}

	public function symptoms()
	{
		$response = $this->algoliaSync(Symptom::all(), 'possibleConditions');
		Symptom::setSettings();
		return response()->json($response);
	}

	public function brandMedications()
	{
		$response = $this->algoliaSync(BrandedMedications::all(), 'genericMedication');

		return response()->json($response);
	}

	public function specializations()
	{
		$response = $this->algoliaSync(Specialization::all(), 'specializable');
		return response()->json($response);
	}

	public function providers()
	{
		$response = $this->algoliaSync(Provider::all());
		return response()->json($response);
	}

	/**
	 * pass an eloquent collection to sync data to algolia server
	 * @param  Illuminate\Database\Eloquent\Collection $datum
	 * @param  string $relation
	 * @param  string $index_name
	 * @return array status
	 */
	public function algoliaSync($datum, $relation = '', $index_name = '')
	{
		$client = $this->client;
		$index = $client->initIndex($index_name ? $index_name : $datum->first()->getTableName());
		$batch = [];
		if ($datum->count()) {
			foreach($datum as $data) {
				$data->objectID = $data->id;

				if ($relation) {
					$data->{$relation}; // run the given relation
				}

				array_push($batch, $data);

				if (count($batch) == 200) {
					$res = $index->saveObjects($batch);
					$index->waitTask($res['taskID']);
					$batch = [];
				}
			}
			$index->saveObjects($batch);
			return [
				'status' => 'OK',
			];
		}
		return [
			'status' => 'FAILED',
			'message' => 'no data found!',
		];
	}

}
