<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Staff;

class StaffController extends Controller
{
    public function __costruct()
    {
        $this->middleware('billing');
    }

    public function getIndex()
    {
        // dd(auth()->user()->points->sum('point') );
        $staffs = auth()->user()->staffs;
        // dd($user->user->full_name);
        $data = [
            'staffs' => $staffs, 
        ];
        return view('profile.staff.index')->with($data);
    }

    public function getStaff()
    {
        $user = auth()->user();
        return $user->staffs;
    }

    public function postAddStaff(Request $request) 
    {
    	$data = $request->all();
    	$user = auth()->user();
    	$data['subscriber_id'] = $user->id;
    	$staff = User::where('email', $data['email'])->get();
   		// dd($staff->first()->id);
        // dd($staff->first()->role);
    	if ($staff->count() > 0 ) // existing user
    	{
    		// add condition for maximum number of seats
            if($user->staffs->where('user_id', $staff->first()->id)->count() > 0) {
                return response()->json([
                    'success' => false,
                    'result' => 'accountexists',
                    'message' => 'User already part of your staff.',
                ]);
            }
            elseif ($staff->first()->role == 1 || $staff->first()->role == 3) {
                return response()->json([
                    'success' => false,
                    'result' => 'invalidrole',
                    'message' => 'You can only add a clinician or provider as your staff.',
                ]);
            }
            else {
                $data['user_id'] = $staff->first()->id;
                $save = Staff::create($data);
                return response()->json([
                    'success' => true,
                    'result' => 'accountuser',
                    'message' => 'You successfully added your staff',
                ]);
            }
    	}
    	else //non-account 
    	{
    		return response()->json([
    			'success' => false,
    			'result' => 'nonaccount',
    			'message' => 'The email address you entered is not valid. Please enter email address with a careparrot account.',
    		]);
    	}

    }
}
