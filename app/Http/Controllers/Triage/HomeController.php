<?php namespace App\Http\Controllers\Triage;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use JavaScript;
use App\Models\Medication;
use App\Models\MedicalDoctor;
use App\Models\Condition;
use App\Models\User;
class HomeController extends Controller {

	public function getIndex(Request $request)
	{
		$data = $request->all();

		$data['alid'] = env('ALGOLIA_ID');
		$data['alkey'] = env('ALGOLIA_KEY');
		JavaScript::put($data);
		return view('main.triage.index');
	}

	public function getSearch(Request $request)
	{
		return Condition::search($request->input('input'));
	}
}
