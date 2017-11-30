<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Provider;
use App\Models\User;
use App\Models\Appointment;
use App\Models\PatientVital;
use Hashids\Hashids;
use PDF;

use App\Notifications\Appointments\ProviderHasSetAppointment;
use App\Notifications\Appointments\ProviderUpdatedAppointment;

class PatientController extends Controller
{
    private $hashid;

    public function __construct()
    {
        $this->hashid = new Hashids(config('services.hashid.salt'), 10);
    }

    public function getIndex()
    {
        return view('profile.patients.index');
    }

    public function getPatientInfo($hashedid)
    {
        return response()->json([
            'patient' => $patient,
            'user' => $patient->user,
        ]);
    }

    public function viewPatient($hashedid)
    {
        $providerUser = auth()->user();
        $patient =  $this->getPatientHelper($hashedid);
        $patientUser = $patient->user;
        $permission = $patientUser->permissions()
                        ->where('provider_id', $providerUser->id)->first();
        $data = [
            'patient' => $patient,
            'permission' => $permission,
        ];
        return view('profile.patients.view')->with($data);
    }

    /**
     * generate the pdf
     * @param  string $hashedid 
     * @return mixed           [description]
     */
    public function download($hashedid)
    {
        $providerUser = auth()->user();
        $patient =  $this->getPatientHelper($hashedid);
        $patientUser = $patient->user;
        $permission = $patientUser->permissions()
                ->where('provider_id', $providerUser->id)->first();

        if (!$patient->user && !$permission) {
            abort(404);
        }

        $data = [
            'patient_name' => $patientUser->full_name,
            'provider_name' => "Dr. " . $providerUser->full_name,
            'signature_provider' => ltrim($providerUser->signature->path, '/'),
            'signature_patient' => ltrim($patientUser->signature->path, '/'),
            'permission' => $permission,
            'date' => $permission->count() ? $permission->created_at->format('F j, Y h:i A') : '',
        ];
        
        $pdf = PDF::loadView('pdf.patient.information', $data);
        // $pdf->output();
        return $pdf->stream();
    }

    public function postVitals(Request $request) 
    {
        $data = $request->all();
        $data['patient_id'] = $this->getPatientHelper($data['patient_id'])->id;
        $save = PatientVital::create($data);
        return response()->json([
            'success' => true,
        ]);
    }

    //provider create new appointment
    public function create($hashedid)
    {
        $data = request()->all();
        
        $patient =  $this->getPatientHelper($hashedid);
        $patientUser = $patient->user;
        // $provider = Provider::where('id', $data['provider_id'])->first(); 
        $provider = Provider::find($data['provider_id']); // NOTE: @cath
        
        // $providerUser = $provider->user->first(); // NOTE: @cath ????
        $providerUser = $provider->user;

        $appointment = Appointment::create($data);
        
        $patientUser->notify(new ProviderHasSetAppointment(
                $provider->full_title,
                $appointment,
                $provider->full_address,
                $patientUser->full_name
            ) );

        $providerUser->notify(new ProviderHasSetAppointment(
                'You',
                $appointment,
                $provider->full_address,
                $patientUser->full_name
            ));
  
        return response()->json([
            'appointment' => $appointment->load('provider', 'patient'),
        ]);
    }

    //update patient appointment
    public function updateAppointment(Request $request, $hashedid)
    {
        $data = $request->all();
        
        // notifications
        $provider = Provider::where('id', $data['provider_id'])->first();
        $providerUser = $provider->user->first();
        $patient =  $this->getPatientHelper($hashedid);
        $patientUser = $patient->user;

        $appointment = Appointment::find($data['id']);
        $update = $appointment->update($data);
        $providerUser->notify(new ProviderUpdatedAppointment(
                'You',
                $request->except(['patient', 'provider']),
                $provider->full_address,
                $patientUser->full_name
            ) );
        
        $patientUser->notify(new ProviderUpdatedAppointment(
                $provider->full_title,
                $request->except(['patient', 'provider']),
                $provider->full_address,
                $patientUser->full_name
            ) );

        return response()->json([
            'appointment' => $appointment->load('provider', 'patient'),
        ]);   
    }

    public function createPatient(Request $request)
    {
        $provider_id = auth()->user()->id;

        $data = $request->all();
        $data['language'] = explode(' ', $data['language']);
        $data['is_provider_generated'] = true;
        $data['provider_id'] = $provider_id;
        $patient = Patient::create($data);
        
        // NOTE: $patient should create User data as well. 
        $username = usernamify($patient->name);

        $patientUser = User::create([
            'username' => $username,
            'password' => passwordify($username),
            'email' => $patient->email ?:emailify($username),

            'role' => 1,
            'first' => 1,
            'first_name' => $patient->first_name,
            'middle_name' => $patient->middle_name,
            'last_name' => $patient->last_name,
        ]);
        $patientUser->patient()->save($patient);

        // temporary for provider subscriber view
        // provider_id condition for staff
        
        $save = $patient->providers()->attach($provider_id);
        return response()->json([
            'success' => true,
            'message' => 'Successfully added patient!',
            'patient'  => $patient,
        ]);
    }

    public function getInformations($hashedid)
    {
        $patient = $this->getPatientHelper($hashedid);
        return view('profile.patients.informations')->with([
            'patient' => $patient,
        ]);
    }

    public function getMedications($hashed)
    {
        $patient = $this->getPatientHelper($hashed);
        return view('profile.patients.medications')->with([
            'patient' => $patient,
        ]);
    }

    public function getList()
    {
        $patients = auth()->user()->patients()->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $patients,
        ]);
    }

    public function getAppointments($hashedid, Patient $patient)
    {
        $hash = $this->hashid->decode($hashedid);
        $user = auth()->user();
        if (count($hash)) {
            $patient = $patient->find($hash[0]);
            return view('profile.patients.appointments')->with([
                'patient' => $patient,
            ]);
        }
        else {
            abort(404);
        }
    }

    public function getPatientAppointments($hashedid, Patient $patient)
    {
        $hash = $this->hashid->decode($hashedid);
        if (count($hash)) {
            $patient = $patient->find($hash[0]);
            $ids = [];
            foreach (auth()->user()->providers as $key => $value) {
                array_push($ids, array($value->id));
            }
            // dd($ids);
            $appointments = $patient->appointments()
                        // ->where('provider_id', auth()->user()->id)
                        ->whereIn('provider_id', $ids)
                        ->with(['provider', 'patient'])
                        ->get();
            // dd($appointments->first()->provider->full_title);
            return response()->json([
                'appointments' => $appointments,
                'patient' => $patient,
            ]);
        }
        else {
            abort(404);
        }
    }

    public function getPatient($hashedid, Patient $patient)
    {
        $hash = $this->hashid->decode($hashedid);

        $patient = $patient->find($hash[0]);
        return $patient;
    }

    public function deleteAppointment($id, Request $request, Appointment $appointment, Patient $patient)
    {
        $hash = $this->hashid->decode($id);
        $patient = $patient->find($hash[0]);
        $appointment = $patient->appointments()->find(request('id'));
        $delete = $appointment->delete();
        return response()->json([
            'success' => $delete,
        ]);
    }

    public function getActions($hashedid)
    {
        $patient = $this->getPatientHelper($hashedid);
        return $patient;
    }

    private function getPatientHelper($id)
    {
        $hash = $this->hashid->decode($id);

        if (count($hash))
            return Patient::find($hash[0]);
        else
            abort(404);
    }
}
