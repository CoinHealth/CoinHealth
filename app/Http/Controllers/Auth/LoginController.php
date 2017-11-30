<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login as LoginRequest;
use App\Models\User;
use App\Models\UserLog;
use Auth;
use Socialize;

// events
use App\Events\UserWasLoggedIn;
use App\Events\CelebratingAnniversary;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout','postPrevent', 'getWelcome'] ]);
    }

    public function getIndex()
    {
        return view('main.auth.login');
    }

    public function getWelcome()
    {
        if (!auth()->check()) {
            return redirect('/auth/login');
        }
        $user = auth()->user();
        $user->first = 0;
        $user->save();
        $data = [
            'user' => $user,
        ];
        return view('main.auth.welcome')->with($data);
    }

    public function postPrevent(Request $request)
    {
        $user = auth()->user();
        $user->prevent_modal = 1;
        $user->save();
        return $user;
    }

    public function getLogout()
    {
        $saveLog = UserLog::create([
            'user_id' => auth()->user()->id, 
            'type' => 0, 
        ]);
        auth()->logout();
        return redirect('/');
    }

    public function postIndex(LoginRequest $request)
    {
        $login = $this->jobLogin($request->input());
        if ($login) {
            // $event= event(new UserWasLoggedIn(auth()->user()));
            // $event2= event(new CelebratingAnniversary(auth()->user()));
            $event= event(new UserWasLoggedIn(auth()->user()));
            // $session= session()->all();
            // dd($session);
            if (auth()->user()->first) {
                return redirect('/auth/welcome');
            }
            elseif (is_null(auth()->user()->digital_id)) {
                return redirect('/profile/coverage');
            }
        }
        return redirect()->back()->withError([
            'Wrong Username or Password',
        ]);
    }

    public function getSocialAuth($provider=null)
    {
        if(!config("services.$provider"))
        abort('404'); //just to handle providers that doesn't exist

        return Socialize::with($provider)->redirect();
    }

    public function getSocialAuthCallback($provider=null)
    {
        if($socialUser = Socialize::with($provider)->user()){

            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                $user = User::firstOrCreate([
                    'username' => $socialUser->getEmail(),
                    'email' => $socialUser->getEmail(),
                    'avatar' => $socialUser->getAvatar(),
                    'first' => 1,
                ]);
            }

            if ($login = Auth::loginUsingId($user->id)) {
                // $event = event(new UserWasLoggedIn(auth()->user()));
                // $event2 = event(new CelebratingAnniversary(auth()->user()));
                if (auth()->user()->first)
                return redirect('/auth/welcome');
                return redirect('/');
            }
        }
        else{
            return 'something went wrong';
        }
    }
    // Jobs

    private function jobLogin($request)
    {
        return Auth::attempt([
            'username' => $request['username'],
            'password' => $request['password'],
        ]);
    }
}
