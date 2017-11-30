<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EhrLead;
use App\Models\Provider;
use App\Events\UserSetAppointment;
use App\Notifications\Appointments\PatientHasSetAppointment;

class DirectoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('patient');
    }

    public function getIndex()
    {
        // dd(auth()->user()->directories);
    	$data = [
			'directories' => auth()->user()->directories,
    	];
        return view('profile.directory.index')->with($data);
    }

    public function setAppointment(Request $request)
    {
    	$data = $request->all();
        $provider = Provider::where('id', $data['provider_id'])->first();
        $providerUser = $provider->user->first();

        $patient = auth()->user();
    	$data['user_id'] = $patient->id;
    	$appointment = EhrLead::create($data);
        
    	if($appointment) {
            // notification
            $providerUser->notify(new PatientHasSetAppointment(
                    $patient->full_name,
                    $appointment,
                    $provider->full_title,
                    $provider->full_address
                ));

            $patient->notify(new PatientHasSetAppointment(
                    'You',
                    $appointment,
                    $provider->full_title,
                    $provider->full_address
                ));

            $event= event(new UserSetAppointment(auth()->user()));
            $points = session()->get('Points') ? session()->get('Points') : '';
            $award = session()->get('Award') ? session()->get('Award') : '';
            session()->forget('Points');
            session()->forget('Award');
			return response()->json([
				'success' => true,
				'message' => 'Appointment sucessfully sent to provider. You can view the status of your appointment in activity module.',
                'points' => $points,
                'award' => $award,
			]);
    	}
    	else {
    		return response()->json([
				'success' => false,
				'message' => 'Appointment not set.',
			]);
    	}

    }
}
