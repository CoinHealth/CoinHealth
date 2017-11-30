<?php namespace App\Http\Controllers\Concierge;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

	public function getIndex()
    {
        return view('main.concierge.index');
    }

}
