<?php

namespace App\Http\Controllers\Social;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getIndex()
    {
        return view('main.social.index');
    }
}
