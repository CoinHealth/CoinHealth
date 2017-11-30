<?php namespace App\Http\Controllers\JobBased;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Events\AskHealth;

class HomeController extends Controller {

	public function getJobBased()
	{
		if(auth()->user())
      		event(new AskHealth(auth()->user()));
  		return view('main.job-based.index');
	}

}
