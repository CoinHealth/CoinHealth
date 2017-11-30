<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login;
use Auth;
use App\Events\UserWasLoggedIn;
use App\Events\CelebratingAnniversary;
class AuthController extends Controller {

	public function postLogin(Login $request)
	{
		$attempt = Auth::attempt([
            'username' => $request['username'],
            'password' => $request['password'],
        ]);
		if ($attempt) {
			$event= event(new UserWasLoggedIn(auth()->user()));
	        $event2= event(new CelebratingAnniversary(auth()->user()));
		}
		return redirect()->back(); // FIXME.
	}

	public function checkAuth()
	{
		return response()->json([
			'authed' => auth()->check(),
		]);
	}

}
