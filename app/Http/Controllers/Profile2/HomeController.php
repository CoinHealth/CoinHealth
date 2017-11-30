<?php

namespace App\Http\Controllers\Profile2;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Profile\ReplyTimelineRequest;
class HomeController extends Controller
{
  public function getVisitor()
  {
    return view('main.profile2.visitor');
  }

  public function getIndex()
  {
    $data = [
      'user' => auth()->user(),
    ];
    dd($data['user']->level);
    return view('main.profile2.index')->with($data);
  }

}
