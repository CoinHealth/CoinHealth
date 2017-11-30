<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EhrLead;
use App\Models\Patient;
use App\Models\Appointment;
use Carbon\Carbon;
class ActivityController extends Controller
{
    public function getActivity($id)
    {
    	$activity = EhrLead::find($id);
    	// $user = $activity->provider;
    	return $activity;
    }

    public function get()
    {
        $user = auth()->user();
        return response()->json([
            'activities' => $user->notifications,
        ]);
    }

    public function postActivity(Request $request)
    {
    	$data = $request->all();
    	$ehr = EhrLead::find($data['activity_id']);
    	$lead = $ehr->user;
        $ehr->update([
            'status' => 1    
        ]);

        $patient = Patient::where('user_id', $lead->id)->get();
        if ($patient->count() == 0) {

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
        else {
            $patient = $patient->first();
        }
        $data['ehr_lead_id'] = $ehr->id;
    	$data['provider_id'] = $ehr->provider->id;
    	$data['patient_id'] = $patient->id;
        $data['scheduled_on'] = Carbon::parse($data['scheduled_on']);
        // dd($data);
        if (!$patient->providers->contains(auth()->user()->id)) {
            $attach = $patient->providers()->attach(auth()->user()->id);
        }

    	$appointment = Appointment::create($data);
    	
    	return response()->json([
				'success' => true,
				'message' => 'Appointment successfully confirmed!',
                'id' => $ehr->id,
                'appointment' => $appointment,
			]); 
    }

}
