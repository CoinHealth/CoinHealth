<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function index()
    {
        return view('profile.coverage.form');
    }

    public function save(Request $request)
    {
        $user = auth()->user();
        $insurance = $request->get('insurance');
        $cpData = $request->get('careparrot');
        $coverage = $user->patient->coverage();
        $data = [
            'has_coverage' => true,
            'insurance_provider_name' => $insurance['name'],
            'insurance_provider_id' => $insurance['id'],
        ];
        if ($coverage->count())
            $cov = $coverage->update($data);
        else
            $cov = $coverage->create($data);

        return response()->json([
            'success' => boolval($cov),
        ]);

    }
}
