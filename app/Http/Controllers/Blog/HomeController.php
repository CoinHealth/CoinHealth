<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Events\AskHealth;

class HomeController extends Controller
{
    public function getIndex()
    {
    	if(auth()->user())
      		event(new AskHealth(auth()->user()));
        return view('main.blogs.index');
    }
}
