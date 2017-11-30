<?php namespace App\Http\Controllers\Learn;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Events\AskHealth;

class HomeController extends Controller {

	public function getIndex()
	{
		 if(auth()->user())
      		event(new AskHealth(auth()->user()));
  		return view('main.learn.index');
	}

}
