<?php namespace App\Http\Controllers\ResourceCenter;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

	public function getCalendar() {
		return view('main.resources.index');
	}

	public function getLosingHealth() {
		return view('main.resources.loss-health');
	}

	public function getLosingHealth2() {
		return view('main.resources.loss-health2');
	}

	public function getResidence() {
		return view('main.resources.residence');
	}

	public function getQualifying() {
		return view('main.resources.qualifyingchanges');
	}
}
