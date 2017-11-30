<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

// use App\Models\MedicalDoctor;
use App\Models\Provider;
use App\Models\User;
class DoctorController extends Controller {

	public function getDoctors($id)
    {
    	$providers = Provider::where('saveable_id', $id)
    						->where('saveable_type', 'App\Provider')
    						->get();
		
    	return response()->json([
			'role' => auth()->user()->purpose,
			'provider' => $providers,
			'provider_count' => auth()->user()->dbProviders()->count(),
		]);
    }

    public function getProviders($id)
    {
    	$providers = User::find($id)->providers;
    	return $providers;
    }

    public function checkSubscription($provider_id)
    {

        $provider = Provider::find($provider_id);
        $isSubscribed = $provider->is_ehr_subscribed;
        $doctor = $provider->user()->exists() ? $provider->user->first() : '';
        $data = [
            'isSubscribed' => (string) $isSubscribed,
            'doctor' => $doctor,
        ];  
        return $data;
    }

}
