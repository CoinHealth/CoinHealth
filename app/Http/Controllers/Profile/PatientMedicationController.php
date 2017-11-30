<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use Hashids\Hashids;
class PatientMedicationController extends Controller
{
    private $hashid;
    public function __construct()
    {
        $this->hashid = new Hashids(config('services.hashid.salt'), 10);
    }

    public function getMedications($hashid)
    {
        $patient = $this->getPatient($hashid);
        return $patient;
    }

    public function create($hashedid, Request $request)
    {
        $patient = $this->getPatient($hashedid);
        
        $medication = $patient->medications()
                            ->create($request->all());
        return response()->json([
            'medication' => $medication,
        ]);
    }

    private function getPatient($id)
    {
        $patient = new Patient;
        $hash = $this->hashid->decode($id);
        if (count($hash))
            return $patient->find($hash[0]);
        else
            abort(404);
    }
}
