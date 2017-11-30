<?php namespace App\Http\Controllers\Complicated;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

	public function getComplicatedCases()
	{
		return view('main.complicated-cases.index');
	}

}
