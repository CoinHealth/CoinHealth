<?php namespace App\Http\Controllers\Activity;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Activity;
class HomeController extends Controller {

	public function postActivity(Request $request) {
		$data= $request->input();
		$data['user_id'] = auth()->user()->id;
		Activity::create($data);
	}

}
