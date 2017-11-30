<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientFlag;
use Hashids\Hashids;

class PatientFlagController extends Controller
{
    private $hashid;
    public function __construct()
    {
        $this->hashid = new Hashids(config('services.hashid.salt'), 10);
    }

    public function index($hashedid)
    {
        $patient = $this->getPatient($hashedid);
        return view('profile.patients.flags')->with([
            'patient' => $patient,
        ]);;
    }

    public function get($hashedid)
    {
        $patient = $this->getPatient($hashedid);
        return response()->json([
            'patient' => $patient,
        ]);
    }

    public function store($hashedid, Request $request) 
    {
        $patient = $this->getPatient($hashedid);
        $data = $request->all();
        $data['patient_id'] = $patient->id;
        $flag = PatientFlag::create($data);
        return response()->json([
            'flag' => $flag,
        ]);
    }

    public function edit($hashedid, $id, Request $request)
    {
        $patient = $this->getPatient($hashedid);
        $flag = $patient
            ->flags()
            ->find($id)
            ->update($request->all());

        return response()->json([
            'flag' => PatientFlag::find($id),
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
