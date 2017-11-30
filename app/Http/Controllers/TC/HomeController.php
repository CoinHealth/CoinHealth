<?php namespace App\Http\Controllers\TC;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

	public function getTerms()
	{
		return view('main.tc.index');
	}
}
