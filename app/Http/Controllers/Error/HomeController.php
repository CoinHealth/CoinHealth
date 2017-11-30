<?php

namespace App\Http\Controllers\Error;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getError()
    {
        return view('main.error.index');
    }
}
