<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\User;
class LeaderboardController extends Controller
{
    public function getIndex()
    {
    	$patients = User::where('role', 1)
    			->whereHas('points', function($qry) {
    				$qry->groupBy('user_id');
    			})
		    	->get()
    			->sortByDesc('total_points')
    			->take(10);

    	$providers = User::where(function($q) {
    				$q->where('role', 2)
    					->orWhere('role', 4);
		    	})
    			->whereHas('points', function($qry) {
    				$qry->groupBy('user_id');
    			})
		    	->get()
    			->sortByDesc('total_points')
    			->take(10);
    	$data = [
    		'patients' => $patients,
    		'providers' => $providers,
    	];
    	// ->orderBy( function($user) {
		    	// 	return $user->total_points;
		    	// }, 'desc')
    	return view('profile.leaderboards.index')->with($data);
    }
}
