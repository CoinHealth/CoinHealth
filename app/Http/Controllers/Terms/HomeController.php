<?php namespace App\Http\Controllers\Terms;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

	public function getTerms()
	{
		return redirect('/terms/service');
	}
	public function getAdvertising()
	{
		return view('main.terms.advertising');
	}
	public function getCookie()
	{
		return view('main.terms.cookie');
	}
	public function getHipaa()
	{
		return view('main.terms.hipaa');
	}
	public function getQuote()
	{
		return view('main.terms.quote');
	}
	public function getService()
	{
		return view('main.terms.service');
	}
	public function getPrivacy()
	{
		return view('main.terms.privacy');
	}
}
