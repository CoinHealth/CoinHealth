<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoverageController extends Controller
{
    public function __construct()
    {

    }

    public function getIndex()
    {
        return view('profile.coverage.index');
    }

    public function getInsuranceCard()
    {
        $user = auth()->user();

        $coverage = $user->patient->coverage;
        if ($coverage) {
            $coverage->load('cardFront', 'signature','careparrotId');
        }
        return view('profile.coverage.insurance')->with([
            'coverage' => $coverage,
        ]);
    }

    public function getCoverage()
    {
        $user = auth()->user();
        $coverage = $user->patient
                        ->coverage;
        if ($coverage) {
            $coverage->load([
                'primaryInsuranceCardFront', 
                'secondaryInsuranceCardFront', 
                'signature', 
                'careparrotId'
            ]);
        }
        return response()->json([
            'coverage' => $coverage,
        ]);
    }

    public function post(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();
        $coverage = $user->patient->coverage();

        // check if coverage is existing
        if ($coverage->count()) {
            $coverage->update([
                'secondary_insurance' => json_encode($data['secondary_insurance']),
                'insurance' => json_encode($data['insurance']),
                'careparrot' => json_encode($data['careparrot']),
            ]);
        }
        else {
            $coverage->create([
                'secondary_insurance' => $data['secondary_insurance'],
                'insurance' => ($data['insurance']),
                'careparrot' => ($data['careparrot']),
                'has_coverage' => true,
            ]);
        }

        // get Coverage Model
        $coverage = $coverage->first();

        if ($request->hasFile('careparrot_id')) {
            $cpId = $request->file('careparrot_id');
            $cpIdPath = $cpId->store('careparrot-id');
            $coverage->careparrotId()->create([
                'user_id' => $user->id,
                'title' => $cpId->getClientOriginalName(),
                'path' => "/uploads/{$cpIdPath}",
                'mime_type' => $cpId->getClientMimeType(),
                'file_type' => 8,
            ]);
        }

        if ($request->hasFile('primary_insurance_card_front')) {
            $primaryFrontCard = $request->file('primary_insurance_card_front');
            $path = $primaryFrontCard->store('insurance-cards');
            $coverage->primaryInsuranceCardFront()->create([
                'user_id' => $user->id,
                'title' => $primaryFrontCard->getClientOriginalName(),
                'path' => "/uploads/{$path}",
                'mime_type' => $primaryFrontCard->getClientMimeType(),
                'file_type' => 5,
            ]);
        }

        if ($request->hasFile('secondary_insurance_card_front')) {
            $secondaryFrontCard = $request->file('secondary_insurance_card_front');
            $path = $secondaryFrontCard->store('insurance-cards');
            $coverage->secondaryInsuranceCardFront()->create([
                'user_id' => $user->id,
                'title' => $secondaryFrontCard->getClientOriginalName(),
                'path' => "/uploads/{$path}",
                'mime_type' => $secondaryFrontCard->getClientMimeType(),
                'file_type' => 9,
            ]);
        }



        return response()->json([
            'success' => boolval($coverage),
        ]);
    }


    public function postInsuranceCard(Request $request)
    {
        $user = auth()->user();
        $file = $request->file('insurance_card');
        $path = $file->store('insurance-cards');
        $coverage = $user->patient->coverage();
        if (!$coverage->count()) {
            $coverage = $coverage->create([
                'has_coverage' => true,
            ]);
        }

        $coverage->cardFront()->create([
            'user_id' => $user->id,
            'title' => $file->getClientOriginalName(),
            'path' => "/uploads/{$path}",
            'mime_type' => $file->getClientMimeType(),
            'file_type' => 5,
        ]);

		return response()->json([
			'success' => true,
			'path' => $path,
		]);
    }



    public function deleteInsuranceCard()
    {
        $user = auth()->user();
        $user->patient->coverage->cardFront()->delete();
        return response()->json([
			'success' => true,
		]);
    }

    public function delete()
    {
        $user = auth()->user();
        $coverage = $user->patient->coverage;
        $coverage->cardFront->delete();
        $coverage->delete();
        return response()->json([
            'success' => $coverage,
        ]);
    }
}
