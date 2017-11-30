<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;

class LocationController extends Controller
{
    public function getState()
    {
        return response()->json([
            'data' => Location::state()
                        ->select('id', 'state_abbr', 'pretty_name')
                        ->get(),
        ]);
    }

    public function getCities($state)
    {
        $cities = Location::where('state_abbr', $state)
                        ->groupBy('city')
                        ->select('id', 'city')
                        ->get();
        return response()->json([
            'data' => $cities,
        ]);
    }
}
