<?php namespace App\Http\Controllers\Household;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

	public function getIndex()
	{
		return view('main.household-cases.index');
	}

}
