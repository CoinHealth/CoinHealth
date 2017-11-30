<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MedCondition;

class ConditionController extends Controller
{
    public function __construct()
    {
        if (request()->input('token') != env('SEED_TOKEN'))
            dd('Unauthorized');
    }

    public function index(Request $request)
    {
        $symp = MedCondition::paginate(20);
        return response()->json($symp);
    }
}
