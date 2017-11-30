<?php namespace App\Http\Controllers\Health;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Events\UserIsAHealthAchiever;

use App\Models\Health;
class HomeController extends Controller {
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function postHealth(Request $request)
	{
		$id= $request->input("health");
		$health= Health::find($id);
		$answer= $request->input("answer");
		$event= event(new UserIsAHealthAchiever(auth()->user(), $health, $answer));
		$session= session()->get('HealthID');
		$data= [
			'session' => $session,
		];
		return redirect()->back()->with('session', 'done');
	}




}
