<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Provider;
use App\Models\User;
use App\Models\Patient;

class LeadController extends Controller
{
    public function __construct()
    {
        // $this->middleware('ehr.subscriber');
    }

    public function getIndex()
    {
        $leads = [];
        if(auth()->user()->is_subscriber) {
            $leads = auth()->user()->providers->first()->leads;
        }
        $data = [
            'leads' => $leads,
        ];
        return view('profile.leads.index')
                ->with($data);
    }

    public function setPatient(Request $request)
    {
        $data = $request->all();
        $lead = User::find($data['user_id']);
        if($lead->patient) {
            $patient = $lead->patient;
        }
        else {
            $patient_info = [
                'user_id' => $lead->id,
                'first_name' => $lead->first_name,
                'middle_name' => $lead->middle_name,
                'last_name' => $lead->last_name,
                'email' => $lead->email,
                'gender' => $lead->gender,
                'dob' => $lead->dob,
                'current_address' => $lead->address,
            ];
            $patient = Patient::create($patient_info);
        }

        if (!$patient->providers->contains(auth()->user()->id)) {
            $attach = $patient->providers()->attach(auth()->user()->id);
        }

        return response()->json([
                'success' => true,
                'id' => $data['user_id'],
            ]);

    }
}
