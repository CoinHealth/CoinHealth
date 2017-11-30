<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientAllergy;
use Hashids\Hashids;

class PatientAllergyController extends Controller
{
    private $hashid;
    public function __construct()
    {
        $this->hashid = new Hashids(config('services.hashid.salt'), 10);
    }

    public function index($hashedid)
    {
        $patient = $this->getPatient($hashedid);
        return view('profile.patients.allergies')->with([
            'patient' => $patient,
        ]);
    }

    public function store($hashedid, Request $request) 
    {
        $patient = $this->getPatient($hashedid);
        $data = $request->all();
        $data['patient_id'] = $patient->id;
        $allergy = PatientAllergy::create($data);
        return response()->json([
            'allergy' => $allergy,
        ]);
    }

    public function get($hashedid)
    {
        $patient = $this->getPatient($hashedid);
        return response()->json([
            'patient' => $patient->load('allergies'),
        ]);
    }

    private function getPatient($id)
    {
        $hash = $this->hashid->decode($id);
        if (count($hash))
            return Patient::find($hash[0]);
        else
            abort(404);
    }
}
