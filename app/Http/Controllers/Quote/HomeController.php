<?php

namespace App\Http\Controllers\Quote;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        return view('main.quotes.index');
    }

    public function create(Request $request)
    {
      $name = explode(' ', $request->input('employee_name') );
    	$data = [
    		'name' => $name[0],
    	];
    	return redirect('/quote-finished')->with($data);
    }

}
