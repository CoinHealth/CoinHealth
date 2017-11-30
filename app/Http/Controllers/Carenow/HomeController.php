<?php namespace App\Http\Controllers\Carenow;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

	public function getCarenow()
	{
		return view('main.careconnect.carenow.index');
	}

	public function getSearch()
	{
		return view('main.careconnect.carenow.search');
	}

	public function getShop()
	{
		return view('main.careconnect.carenow.shop');
	}

}
