<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Location;
use App\Models\Quote;
//events
use App\Events\UserGiveThanks;
use Session;
use Carbon\Carbon;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
class HomeController extends Controller {

	public function __construct()
	{
		// $this->middleware('auth');
	}

	public function getIndex()
	{
		$data = [
			'user' => auth()->user(),
		];
		// return view('main.landing.newlanding')->with($data);
		return view('landing.index')->with($data);
	}

	public function setLocale($locale)
	{
		Session::put('locale', $locale);
		return redirect()->back();
	}

	public function finished(Request $request)
	{
		$data = [
			'name' => $request->input('name'),
		];
		if ($data && auth()->user())
			event(new UserGiveThanks(auth()->user()));
		if (!$request->has('name'))
			return redirect('/quote');
		return view('main.landing.finished')->with($data);
	}

	public function postFinished(Request $request)
	{
		$data = $request->input('data');
		$uuid = Uuid::uuid4();
		$data['uuid'] = $uuid->toString();
		$data['applicants'] = json_encode($data['applicants']);
		$data['payment_info'] = json_encode($data['payment_info']);
		$data['plan'] = json_encode($data['plan']);
		// $data['agreements'] =  json_encode($data['agreements']);
		if(!empty($data['additional_information']))
			$data['additional_information'] =  json_encode($data['additional_information']);
	  else
			$data['additional_information'] =  '';
		if(!empty($data['agreements']))
			$data['agreements'] =  json_encode($data['agreements']);
	  else
			$data['agreements'] =  '';
		$quote = Quote::create($data);
		if(auth()->user()) {
			if (auth()->user()->purpose == '3') {
			$userId= \DB::connection('mysql_crm')->table('users')
					->where('username', auth()->user()->username)->pluck('id');

				\DB::connection('mysql_crm')
					->table('agent_quote')
					->insert([
						'user_id' => $userId,
						'quote_id' => $quote->id,
						'created_at' => Carbon::now(),
						'updated_at' => Carbon::now(),
					]);
			}
			return response()->json([
				'data' => 'finished',
			]);
		}

	}


	public function coming()
	{
		return view('main.landing.coming-soon');
	}

	public function getZipcode(Request $request)
	{
		$location = Location::where('zip_code', $request->input('zip_code'))->first();
		if ($location) {
			$data = [
				'zip_code' => $request->input('zip_code'),
			];
			return redirect()->route('plans',$data);
		}
		return redirect()->back()->with([
			'error' => 'Invalid Zip code',
		]);
	}

	public function redirectQuote()
	{
		return redirect('/quote');
	}

	public function redirectNews()
	{
		return redirect('/community/news');
	}

	public function redirectBlogs()
	{
		return redirect('/community/blogs');
	}

	// this is temporary
	public function gamification()
	{
		return view('gamification.index');
	}

	public function bin()
	{
		return response()-json([
					'success' => true,
				]);
	}

}
