<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use Hashids\Hashids;
class PatientInformationController extends Controller
{
    private $hashid;
    public function __construct()
    {
        $this->hashid = new Hashids(config('services.hashid.salt'), 10);
    }

    public function getInfo($hashedid)
    {
        $patient = $this->getPatient($hashedid);

        return response()->json([
            'data' => $patient,
        ]);
    }

    public function postInfo($hashid, Request $request)
    {
        $patient = $this->getPatient($hashid);
        $save = $patient->update($request->all());
        return response()->json([
            'message' => 'success',
            'success' => $save,
            'data' => $patient,
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
