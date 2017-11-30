<?php namespace App\Http\Controllers\OtherTopics;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Events\AskHealth;

class HomeController extends Controller {

	public function getIndex()
	{
		if(auth()->user())
      		event(new AskHealth(auth()->user()));
  		return view('main.other-topics.index');
	}

	public function getIncarcerated()
	{
		return view('main.other-topics.incarcerated');
	}

	public function getAmerican()
	{
		return view('main.other-topics.american-indian');
	}

	public function getMilitary() {
		return view('main.other-topics.military-veterans');
	}

	public function getDisable() {
		return view('main.other-topics.disable');
	}

	public function getMedicare() {
		return view('main.other-topics.medicare');
	}

	public function getPregnant() {
		return view('main.other-topics.pregnant');
	}

	public function getRetirees() {
		return view('main.other-topics.retirees');
	}

	public function getSamesex() {
		return view('main.other-topics.same-sex');
	}

	public function getTransgender() {
		return view('main.other-topics.transgender');
	}

	public function getUnderage() {
		return view('main.other-topics.underage');
	}
}
