<?php namespace App\Http\Controllers\Directory;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SupportGroupController extends Controller {

	public function getIndex()
	{
		return view('directories.support-group.index');
	}

	public function new()
	{
		return view('directories.support-group.create');
	}
}
