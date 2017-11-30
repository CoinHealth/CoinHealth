<?php namespace App\Http\Controllers\Marketplace;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

	public function getMarketplace()
	{
		return view('main.marketplace.agent');
	}

}