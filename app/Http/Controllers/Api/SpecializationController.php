<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class SpecializationController extends Controller
{
    public function index()
    {
        return Category::specializations()
                // ->select('title as label','value')
                ->get();
    }

    public function doctor()
    {

        $specializations = [];
        $providers = \DB::table('providers')
                        ->select(['provider_id','specialties'])
                        ->groupBy('provider_id')
                        ->get();
        
        foreach($providers as $provider) {
            $specialties = json_decode($provider->specialties);

            $merged = array_merge($specializations,$specialties);
            $intersected = array_intersect($specializations,$specialties);

            $specializations = array_diff($merged,$intersected); 
        }

        return $specializations;
        

    }

    public function search(Request $request)
    {
        $qry = $request->input('title');
        $categories = Category::specializations()->where('title', 'like', "%".$qry)->get();
        return response()->json([
            'data' => $categories,
        ]);
    }
}
