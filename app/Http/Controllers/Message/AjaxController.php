<?php

namespace App\Http\Controllers\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function get($id, Request $request)
    {
        // $chats = $this->getChats()->paginate(1);
        return response()->json([
            'chats' => $chats,
        ]);
    }
}
