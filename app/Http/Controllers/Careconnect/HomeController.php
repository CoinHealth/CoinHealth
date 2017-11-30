<?php namespace App\Http\Controllers\Careconnect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// events
use App\Events\UserGiveRatings;

//for agent Registration
use App\Http\Requests\Auth\Register as RegisterRequest;
use App\Models\User;
use App\Models\HealthcareProvider;
use App\Models\Location;
use App\Models\Credentials;
use App\Models\Premium;
use App\Models\Condition;
use App\Models\Provider;
use Hash;
use Hashids\Hashids;
class HomeController extends Controller {

	public function getCareconnect()
	{
		return view('main.careconnect.carenow.index');
	}

	public function getPartnerships()
	{
		return view('main.careconnect.partnerships');
	}

	public function getSearch()
	{
		return view('main.careconnect.carenow.search');
	}

	public function getShop()
	{
		return view('main.careconnect.carenow.shop');
	}

	public function getShopping()
	{
		return view('main.careconnect.shopping');
	}

	public function getShopitem()
	{
		$data = [
			'user' => auth()->user(),
		];
		return view('main.careconnect.shop-item')->with($data);
	}

	public function getCheckout()
	{

		return view('main.careconnect.checkout');
	}

	public function getPayment()
	{
		return view('main.careconnect.payment');
	}

	public function getIncomeCalculator()
	{
		return view('main.careconnect.income_calculator');
	}

	public function getFacilitySearch()
	{
		return view('main.careconnect.facility-search');
	}

	public function getSupportGroup()
	{
		return view('main.careconnect.support-group');
	}

	public function getDoctorSearch()
	{
		//dd(HealthcareProvider::all()->rating());
		// $data = [
		// 	'user' => auth()->user(),
		// 	'healthcare_providers' => HealthcareProvider::all(),
		// ];
		// return view('main.careconnect.doctor-search')->with($data);
		return view('main.careconnect.newdoctor-search');
	}

	public function postDoctorSearch(Request $request, HealthcareProvider $hp)
	{
		$user = auth()->user();
		$data= $request->except('_token');
		$health = $hp->find($data['healthcare_provider_id']);
		$exists= $health->rating()->where('user_id', $user->id)->get();
	  //$health->rating()->save($user, $data);
		//dd(auth()->user());
		//dd(isset($exists[0]));
		if (isset($exists[0])){
			$health->rating()->updateExistingPivot($user->id, $data);
		}else{
		 	$health->rating()->save($user, $data);
			event(new UserGiveRatings(auth()->user()));
		}
		return response()->json(['success' => true]);
	}

	public function getDoctorCreate(Request $request)
	{
		// dd(auth()->user()->providers->first()->provider_id );
		
	  
		if(auth()->user() ) {

			$data= [
				'user'=> auth()->user(),
				// 'titles' => HealthcareProvider::title()->get(),
				'locations' => Location::state()->get(),
				'is_premium' => $request->has('premium'),
			];
			return view('main.careconnect.create-doctor')->with($data);
		}
		else {
			return redirect('/directory/doctors');
		}

	}

	public function postDoctorCreate(Request $request)
	{
		$data= $request->except('_token');
		$user = auth()->user();
		// $hp = HealthcareProvider::create($data);
		// $data['data_model'] = 'App\HealthcareProvider';
		// $data['data_id']=$hp->id;
		// $data['payment_info']= json_encode($data['payment_info']);
		// Premium::create($data);
		
		$data['name'] = $data['first_name'] . ' ' . $data['last_name'];
		// if already claimed a physician the same provider_id else generate new
		if($user->providers->count > 0) {
			$data['provider_id'] = $user->providers->first()->provider_id;
		} 
		else {
			$hashids = new Hashids('bl0ckcha1n', 10);
			$data['provider_id'] = $hashids->encode([8,time()]);
		}
		$data['categories'] = 'Physicians';
		$data['type'] = 'Physician';

		$data['state'] = Location::distinct('state_abbr')-where('state_abbr', $data['address']['state_abbreviated'])->get()->pretty_name;
		dd($data['state']);
		$save = Provider::create($data);
		dd($save);
		$claim = $user->providers()->attach($save->id);

		return redirect()->back()->with('message', 'Listing created, pending verification.');
	}

	public function getAgentFinder() {
		return view('main.careconnect.agent-finder');
	}

	public function getAgentCreate() {
		return view('main.careconnect.create-agent');
	}

	public function postAgentCreate(RegisterRequest $request)
	{
		$user = $this->jobRegister($request->except('_token'));
		$data = [
			'register.success' => 'Registration Successful',
		];
		return redirect('/careconnect/create-agent')->with($data);
	}

	public function checkValidate(Request $request)
	{
		$find = User::where($request->input('field'), $request->input('value'));
		return $find->count();
	}

	// jobs
	public function jobRegister($request)
	{
	//	dd($request);
		$request['password'] = Hash::make($request['password']);
		$request['first'] = 1;
		if (isset($request['chk_premium']))
			$request['prevent_modal'] = 1;
		//dd($request['prevent_modal']);
		$cpUser = User::create($request);
		if ($request['purpose'] == 3) {
			$request['user_id']= $cpUser->id;
			$agent= Credentials::create($request);
			$crmUser = \DB::connection('mysql_crm')
				->table('users')
				->insert([
					'username' => $request['username'],
					'password' => $request['password'],
					'email' => $request['email'],
					'first_name' => $request['fname'],
					'last_name' => $request['lname'],
					'verified' => 0,
					'agent_type' => 1,
					'role' => 1,
					'work_experience' => '',
				]);
		}

		if (isset($request['chk_premium'])) {
			$request['user_id']= $cpUser->id;
			$request['payment_info']= json_encode($request['payment_info']);
			Premium::create($request);
		}

	}

	//rx pages
	public function getRegister()
	{
		return view('main.careconnect.rx.register');
	}

	public function getMedications()
	{
		return view('main.careconnect.rx.medications');
	}

	public function getMedicationsingle()
	{
		return view('main.careconnect.rx.medication-single');
	}

	public function getChat()
	{
		return view('main.careconnect.rx.chat');
	}

	public function getHistory()
	{
		return view('main.careconnect.rx.medical-history');
	}

	public function getHistory2()
	{
		return view('main.careconnect.rx.medical-history2');
	}

	public function getHistory3()
	{
		return view('main.careconnect.rx.medical-history3');
	}

	public function getHistory4()
	{
		return view('main.careconnect.rx.medical-history4');
	}

	public function getHistory5()
	{
		return view('main.careconnect.rx.medical-history5');
	}

	public function getHistory6()
	{
		return view('main.careconnect.rx.medical-history6');
	}

	public function getHistory7()
	{
		return view('main.careconnect.rx.medical-history7');
	}

	public function getHistory8()
	{
		return view('main.careconnect.rx.medical-history8');
	}

	public function getHistory9()
	{
		return view('main.careconnect.rx.medical-history9');
	}

	public function getHistory10()
	{
		return view('main.careconnect.rx.medical-history10');
	}

	public function getHistory11()
	{
		return view('main.careconnect.rx.medical-history11');
	}

	//new
	public function getClinic()
	{
		return view('main.careconnect.rx.clinic');
	}

	public function getClinicsingle()
	{
		return view('main.careconnect.rx.clinic-single');
	}

	public function getDoctor()
	{
		return view('main.careconnect.rx.doctor');
	}

	public function getDoctorsingle()
	{
		return view('main.careconnect.rx.doctor-single');
	}

	public function getChat2()
	{
		return view('main.careconnect.rx.chat2');
	}

	public function getHistory12()
	{
		return view('main.careconnect.rx.medical-history12');
	}

	//facility
	public function getFacility()
	{
		return view('main.careconnect.facility');
	}

	public function getSupport()
	{
		return view('main.careconnect.support');
	}

}
