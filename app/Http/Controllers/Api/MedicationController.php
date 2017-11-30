<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class MedicationController extends Controller
{
    public function getSig()
    {
        return response()->json([
            'dosages' => Category::sigDosages()->get(),
            'units' => Category::sigUnits()->get(),
            'routes' => Category::sigRoutes()->get(),
            'frequencies' => Category::sigFrequencies()->get(),
            'directions' => Category::sigDirections()->get(),
            'durations' => Category::sigDurations()->get(),
        ]);
    }
}
