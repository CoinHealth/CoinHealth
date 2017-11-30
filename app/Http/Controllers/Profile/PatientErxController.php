<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hashids\Hashids;
use App\Models\Patient;
use PDF;
use Carbon\Carbon;

class PatientErxController extends Controller
{
    private $hashid;

    public function __construct()
    {
        $this->hashid = new Hashids(config('services.hashid.salt'), 10);
    }

    public function index($hashedid)
    {
        $patient = $this->getPatient($hashedid);
        return view('profile.patients.erx')->with([
            'patient' => $patient,
        ]);
    }

    public function post($hashedid, Request $request)
    {
        $patient = $this->getPatient($hashedid);
        dd($request->all());
    }

    public function preview($hashedid, Request $request)
    {
        $patient = $this->getPatient($hashedid);
        $patientUser = $patient->user;

        $providerUser = auth()->user();

        $data = [
            'patient_name' => $patientUser->full_name,
            'provider_name' => "Dr. " . $providerUser->full_name,
            'signature_provider' => ltrim($providerUser->signature_path, '/'),
            'medication' => $request->all(),
            'date' => Carbon::now()->format('F j, Y h:i A'),
            'sig' => $request->get('sig'),
            'medication' => $request->get('medication_name')
        ];
        $pdf = Pdf::loadView('pdf.patient.erx.preview', $data);
        return $pdf->stream();
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
