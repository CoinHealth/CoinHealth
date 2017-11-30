<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\EhrLead;
use App\Models\User;
use App\Models\Provider;

use App\Notifications\Appointments\ProviderApprovedAppointment;
use App\Notifications\Appointments\ProviderDeclinedAppointment;
use App\Notifications\Appointments\ProviderSuggestedAnAppointment;

class AppointmentController extends Controller
{
    public function getIndex()
    {
        $ids = [];
        foreach (auth()->user()->providers as $key => $value) {
            array_push($ids, array($value->id));
        }
        $appointments = Appointment::whereIn('provider_id', $ids)->get();
    	$data = [
    		'appointments' => $appointments,
    	];
        // dd($appointments->first()->patient->url_id );
        return view('profile.appointments.index')->with($data);
    }

    public function getPatient($id)
    {
    	return Appointment::find($id);
    }

    public function updateStatus(Request $request)
    {
    	$data = $request->except('_token');
    	$appointment = Appointment::find($data['appointment_id']);
        // $appointment->timestamps = false;
        $appointment->status = $data['status'];
        $appointment->save();
    	return redirect()->back()->with('message', 'Updated Appointment');
    }

    public function suggestAppointment(Request $request) 
    {
        $data = $request->all();
        $lead = $data['data']['appointment'];
        // update appointment request of patient
        $ehr_lead = EhrLead::find($lead['id']);
        $appointment = $ehr_lead->update($lead);
        $provider = Provider::where('id', $lead['provider_id'])->first();

        $providerUser = $provider->user->first();
        $patientUser = User::find($lead['user_id']);
        
        $notification = $providerUser->notifications()->find($data['id']);
        $notification->markAsRead();

        $providerUser->notify(new ProviderSuggestedAnAppointment(
                'You',
                $lead,
                $provider->full_title,
                $provider->full_address,
                $patientUser->full_name
            ) );

        $patientUser->notify(new ProviderSuggestedAnAppointment(
                $provider->full_title,
                $lead,
                $provider->full_title,
                $provider->full_address,
                $patientUser->full_name
            ) );
        return response()->json([
                'success' => true,
            ]);
    }   


    public function providerApproval(Request $request, $status)
    {
        $data = $request->all();
        $lead = $data['data']['appointment'];
        $ehr_lead = EhrLead::find($lead['id']);

        $provider_id = $lead['provider_id']; //providers(id)
        $provider = Provider::where('id', $provider_id)->first();
        $patient_id = $lead['user_id'];

        $patientUser = User::find($patient_id);
        $providerUser = auth()->user();

        // update ehr leads
        $update = $ehr_lead->update([
                'status' => $status,
            ]);

        // notifications
        $notification = $providerUser->notifications()->find($data['id']);
        $notification->markAsRead();
        if ($status == 1) {
            // save in appointments
            $appointment = [
                'ehr_lead_id' => $lead['id'],
                'patient_id' => $patientUser->patient->id,
                'provider_id' => $provider_id,
                'reason' => $lead['reason'],
                'scheduled_on' => $lead['date'],
                // 'minutes' => $data['minutes'],
                'minutes' => '30',
                'appointment_profile' => $patientUser->fullname,
                // 'exam_room' => $data['exam_room'],
                'exam_room' => 'Room 1',
                'status' => $status,
                // 'doctors_note' => $data['doctors_note'],
                'doctors_note' => '',
            ];
            $saved_appointment = Appointment::create($appointment);
            // data is appointment
            //provider confirmed your appointment on at
            $providerUser->notify(new ProviderApprovedAppointment(
                    'You',
                    $saved_appointment,
                    $provider->full_address,
                    $patientUser->fullname
                ));

            $patientUser->notify(new ProviderApprovedAppointment(
                    $provider->full_title,
                    $saved_appointment,
                    $provider->full_address,
                    $patientUser->fullname
                ));
        } 
        else if ($status == 2) {
            // provider declined your appointment on at
            $providerUser->notify(new ProviderDeclinedAppointment(
                    'You',
                    $ehr_lead,
                    $provider->full_address,
                    $patientUser->fullname
                ));

            $patientUser->notify(new ProviderDeclinedAppointment(
                    $provider->full_title,
                    $ehr_lead,
                    $provider->full_address,
                    $patientUser->fullname
                ));
        }

        return response()->json([
                'success' => true,
            ]);
    }

}
