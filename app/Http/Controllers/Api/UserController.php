<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
class UserController extends Controller
{
    public function search(Request $request)
    {
        $qry = $request->input('query');
        $user = auth()->user();
        $users = User::where('first_name','like',$qry."%")
            ->orWhere('last_name', 'like', $qry."%")
            ->orWhere(DB::raw('concat_ws(" ", first_name,last_name)') , 'like', "%".$qry."%")
            ->select([
                'id',
                'first_name',
                'last_name',
                'role',
            ]);
            
        if (auth()->check())
            $users = $users->where('id', '!=', auth()->user()->id);

        return response()->json([
            "hits" => $users->count(),
            "data" => $users->get(),
        ]);
    }
}
