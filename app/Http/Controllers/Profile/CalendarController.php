<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('billing');
    }

    public function getIndex()
    {
        return view('profile.calendar.index');
    }
}
