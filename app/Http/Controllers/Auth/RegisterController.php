<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register as RegisterRequest;
use App\Models\User;
use App\Models\Chat;
// use App\Models\Credentials;
use App\Models\Agent;
use App\Models\Premium;
use App\Models\Patient;
use App\Jobs\AddNewUserToPublicChat;
use Hash;
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getIndex()
    {
        return view('main.auth.register');
    }

    public function postIndex(RegisterRequest $request)
    {
        $user = $this->jobRegister($request->except('_token'));
        $data = [
            'register.success' => 'Registration Successful',
        ];
        return redirect('/auth/login')->with($data);
    }

    public function checkValidate(Request $request)
    {
        $find = User::where($request->input('field'), $request->input('value'));
        return $find->count();
    }

    // jobs
    public function jobRegister($request)
    {
        $request['password'] = Hash::make($request['password']);
        $request['first'] = 1;
        $request['prevent_modal'] = 0;
        $user = User::create($request);
        dispatch(new AddNewUserToPublicChat($user));
        // // dd($cpUser);
        // if ($request['purpose'] == 3) {
        //   $request['user_id']= $cpUser->id;
        //   $agent= Credentials::create($request);
        //   $crmUser = \DB::connection('mysql_crm')
        //     ->table('users')
        //     ->insert([
        //       'username' => $request['username'],
        //       'password' => $request['password'],
        //       'email' => $request['email'],
        //       'first_name' => $request['fname'],
        //       'last_name' => $request['lname'],
        //       'verified' => 0,
        //       'agent_type' => 1,
        //       'role' => 1,
        //       'work_experience' => '',
        //     ]);
        // }


        if ($request['role'] == 1) {
            $request['user_id'] = $user->id;
            $patient = Patient::create($request);
        }
        else if($request['role'] == 3) {
            $request['user_id'] = $user->id;
            $agent = Agent::create($request);
        }
    }
}
