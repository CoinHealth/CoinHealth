<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Commands\GetLocationsCommand;
use App\Commands\Quotes\GetTaxFineCommand;
use App\Commands\Quotes\GetFPLCommand;
use App\Commands\Quotes\GetStateCommand;
use App\Commands\Quotes\CheckEligibilityCommand;
use App\Commands\GetPlansCommand;
use App\Commands\GetMonthlyPremium;
use App\Commands\GetSubsidyCommand;
use App\Commands\CheckFamilyCommand;
use App\Commands\GetFilteredPlanCommand;
use App\Commands\GetActuarialLevel;
use App\Commands\Plan\GetRating;
use App\Commands\Plan\PostRating;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\HealthcareProvider;
use App\Models\Location;
use App\Models\Subsidy;
use App\Models\Age;
use App\Models\Tax;
use App\Models\User;
use DB;

use App\Commands\AddDoctor;
class HomeController extends Controller {

	private $subsidy;
	private $location;
	private $plans;
	private $fpl_data;
	/**
	 * [getDoctorHospital search for doctors or hospital]
	 * @param  Request $request [description]
	 * @return Doctor Collections [description]
	 */
	public function getDoctorHospital(Request $request)
	{
		$doctors = HealthcareProvider::confirmed()->where(function ($query) use ($request) {
				$query
					->where('name', 'like', '%'. $request->input('query') . '%')
					// ->orWhere( DB::raw('concat_ws(" ", first_name,middle_name,last_name)') , 'like', '%' .$request->input('query') . '%' )
					->orWhere('state', 'like', $request->input('query') . '%')
					->orWhere('affiliations', 'like', $request->input('query') . '%')
					->orWhere('city', 'like', $request->input('query') . '%')
					->orWhere('street', 'like', '%'.$request->input('query'). '%')
					->orWhere('county', 'like', $request->input('query') . '%');
		});
		if ($request->has('zip_code')) {
			$location = Location::where('zip_code', $request->input('zip_code'))->first();
			$clonedDoctors = clone $doctors;
			if ($clonedDoctors->where('state', $location->state_abbr)->take(25)->get()->count())
				return $clonedDoctors->where('state', $location->state_abbr)->take(25)->get();
		}
		return $doctors->take(25)->get();
	}

	public function postDoctor(Request $request)
	{
		$data = $this->dispatch(new AddDoctor($request));
		return $data;
	}

	public function getNewInvoiceNumber()
	{
		return get_new_invoice();
	}

	/**
	 * [getMembers getMembers or Users]
	 * @param  Request $request [description]
	 * @return Users Collection
	 */
	public function getMembers(Request $request)
	{
		$members = User::where(function ($query) use ($request) {
			$query->where('fname', 'like','%'. $request->input('query') . '%')
				->orWhere( DB::raw('concat_ws(" ", fname,lname)') , 'like', '%' .$request->input('query') . '%' )
				->orWhere('lname', 'like', '%'.$request->input('query') . '%')
				->orWhere('display_name', 'like','%'.$request->input('query') . '%')
				->orWhere('username', 'like', '%'.$request->input('query') . '%');
				// ->orWhere('county', 'like', $request->input('query') . '%');
		});
		return $members->get();
	}

	public function getAgents(Request $request)
	{
		$agents = User::where('purpose', 3)->where(function ($query) use ($request) {
				$query->where('fname', 'like','%'. $request->input('query') . '%')
					->orWhere( DB::raw('concat_ws(" ", fname,lname)') , 'like', '%' .$request->input('query') . '%' )
					->orWhere('lname', 'like', '%'.$request->input('query') . '%')
					->orWhere('display_name', 'like','%'.$request->input('query') . '%')
					->orWhere('username', 'like', '%'.$request->input('query') . '%');
			});
		return $agents->get();
	}

	/**
	 * [getLocationDetails get the locations]
	 * @param  string $zip_code [zip code]
	 * @param  boolean  $group    [for grouping]
	 * @return collection            [description]
	 */
	public function getLocationDetails($zip_code = 0,$group = false)
	{
		$locations = $this->dispatch(new GetLocationsCommand($zip_code, $group));
		return $locations;
	}

	public function postEligibility(Request $request)
	{
		$eligibility = $request->input('eligibility');

		$this->subsidy = Subsidy::where('state_abbr', $eligibility['state_abbr'])->first();
		// if ($this->subsidy->isStateBased()) {
		//
		// }
		$eligibility['income'] = monetary($eligibility['income']);

		if (!$eligibility['state_abbr'])
			$eligibility['state_abbr'] = $this->dispatch(new GetLocationsCommand($zip_code, $group))->get(0);

		$_fpl = $this->dispatch(new GetFPLCommand($eligibility['household_size'], $eligibility['income'], $this->subsidy)); // NOTE:60 command moved under \Quotes
		$_tax_penalty = $this->dispatch(new GetTaxFineCommand($eligibility['applicants'], $eligibility['income'])); // NOTE:40 command moved under \Quote
		$_state = $this->dispatch(new GetStateCommand($this->subsidy)); // NOTE:50 command moved under \Quote

		$_applicants = $this->dispatch(new CheckEligibilityCommand(
											$eligibility['applicants'],
											$_fpl['fpl_percentage'],
											$_state['state_abbr'],$this->subsidy)
										); // NOTE:340 store $data['applicants'] variable


		$_options = [
			'county_name' => ucwords(strtolower($eligibility['county'])),
			'state_code' => $_state['state_abbr'],
			'rating_area' => $eligibility['rating_area'],
			'$order' => 'premium_adult_individual_age_21 ASC',
		];

		$_slcsp = $this->dispatch(new GetMonthlyPremium(
			$_applicants, array_merge($_options, ['metal_level' => 'Silver']), null, null, true
		));

		$_subsidy = $this->dispatch(new GetSubsidyCommand($_fpl['fpl_percentage'], $eligibility['income'], $_slcsp, $this->subsidy));
		$data = [
			'fpl' => $_fpl,
			'tax_penalty' => $_tax_penalty,
			'applicants' => $_applicants,
			'subsidy' => round($_subsidy['subsidy']),
			'state' => $_state,
			'status' => $_subsidy['status'],
			'ptc' => $_subsidy['ptc'],
		];
		return $data;
	}

	public function getPlans(Request $request)
	{
		// dd($request->all());
		$_applicants = $request->input('applicants');
		$_fpl = $request->input('fpl');
		$_options = [
			'$order' => 'premium_adult_individual_age_21 ASC',
		];

		$_actuarial = $this->dispatch(new GetActuarialLevel($_fpl['fpl_percentage']));

		$_plans = $this->dispatch(new GetFilteredPlanCommand($_applicants, $_options, $request->input('subsidy'), $_actuarial, [
			'county_name' => ucwords(strtolower($request->input('county_name'))),
			'state_code' => $request->input('state_code'),
			'rating_area' => $request->input('rating_area'),
		]));
		return [
			'plans' => $_plans,
		];
	}

	public function getPlanRating(Request $request)
	{
		$data = $this->dispatch(new GetRating($request));
		return $data;
	}

	public function postPlanRating(Request $request)
	{
		$data = $this->dispatch(new PostRating($request));
		return $data;
	}

}
