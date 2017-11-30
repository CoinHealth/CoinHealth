<?php namespace App\Http\Controllers\Resource\Quote;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

	public function __construct()
	{
		// $this->middleware('auth');
	}
	
	public function getIndex()
	{

		return view('main.quote-engine.index');
	}

	public function loader()
	{
		return view('partials.loader');
	}

	// public function create()
	// {
		
	// }

	// public function store()
	// {
		
	// }

	// public function show($id)
	// {
		
	// }

	// public function edit($id)
	// {
		
	// }

	// public function update($id)
	// {
		
	// }

	// public function destroy($id)
	// {
		
	// }

}
