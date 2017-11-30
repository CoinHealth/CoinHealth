<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hashids\Hashids;
use App\Models\Patient;
use App\Models\PatientPermission;
use App\Notifications\Permissions\ProviderSentRequest;
use App\Notifications\Permissions\PatientDeniedRequest;
use App\Notifications\Permissions\PatientApprovedRequest;
use Carbon\Carbon;
class PermissionController extends Controller
{
	private $hashid;

    public function __construct()
    {
        $this->hashid = new Hashids(config('services.hashid.salt'), 10);
    }

    public function request($id, Request $request)
    {
    	
    	$data = $request->all();
        if ($data['is_requesting']) {
            $providerUser = auth()->user();  // provider
            // for provider
            $patient = $this->getPatient($id);
            $patientUser = $patient->user; // patient

            $permission = $patientUser->permissions()->create([
                'provider_id' => $providerUser->id,
            ]);
            
        }
        $permission = $this->setPermissible(
                $permission, 
                $data['permissions'], 
                $patient->id
            );
        $permission = $permission->load('permissibles');

        // send a PermissionWasRequested to both patient and provider
        $providerUser->notify(new ProviderSentRequest(
                $permission, 
                "You",
                $patientUser->full_name
            ));
        $patientUser->notify(new ProviderSentRequest(
                $permission,
                $providerUser->full_name
            ));

    	return response()->json([
    		'success' => boolval($permission),
    		'permission' => $permission->load('userPatient', 'userProvider'),
    	]);
    }

    /**
     * Get the permissions of patient and provider.
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function get($id)
    {
        $providerUser = auth()->user();
        $patient = $this->getPatient($id);
        $patientUser = $patient->user; 
        $permission = $patientUser->permissions()
                        ->where('provider_id', $providerUser->id);
        return response()->json([
            'success' => true,
            'permission' => $permission->first(),
        ]);
    }

    public function accept($permission_id, Request $request)
    {
        $data = $request->all();
        $permission = PatientPermission::find($permission_id);
        $userProvider = $permission->userProvider;
        $userPatient = $permission->userPatient;

        $notification_id = $request->only("activity_id");
        $notification = $userPatient->notifications()->find($notification_id);
        $notification->markAsRead();

        // update
        $formPermissions = $data['form']['permissions'];
        $permissionValidities = $data['form']['validity'];
        foreach($formPermissions as $permissible) {
            // setup updates 
            $validity = $permissionValidities[$permissible];

            $permissible = $permission->permissibles()->{$permissible}();
            $permissible->update([
                "is_accepted" => true,
                "expired_at" => $validity ? Carbon::now()->addDays($validity) : "0000-00-00"
            ]);
        }

        // send a PatientApprovedRequest notification
        $userPatient->notify(new PatientApprovedRequest(
                "You",
                $permission,
                $userProvider->full_name
            ));
        $userProvider->notify(new PatientApprovedRequest(
                $userPatient->full_name,
                $permission,
                $userProvider->full_name,
                $userPatient->patient->url_id
            ));

        return response()->json([
            "success" => true,
            "permission" => $permission->load('userPatient', 'userProvider'),
        ]);
    }

    public function deny($permission_id, Request $request)
    {
        $permission = PatientPermission::find($permission_id);
        $userPatient = auth()->user();
        $userProvider = $permission->userProvider;

        // Mark the activity as read.
        $notification_id = $request->only("activity_id");
        $notification = $userPatient->notifications()->find($notification_id);
        $notification->markAsRead();

        // send a PatientDeniedRequest notification
        $userPatient->notify(new PatientDeniedRequest("You", $permission));
        $userProvider->notify(new PatientDeniedRequest(
                $userPatient->full_name, 
                $permission
            ));

        // finally, delete the permission.
        $permission = $permission->delete();

        return response()->json([
            "success" => true,
            "success" => $permission->load(''),
        ]);
    }

    /**
     * Get the patient model of specified $id
     * @param  string|int $id 
     * @return \App\Models\Patient
     */
    private function getPatient($id)
    {
        $hash = $this->hashid->decode($id);
        $patient = Patient::find($hash[0]);
        return $patient;
    }

    private function setPermissible($permission, $permissibles, $patientId)
    {
        foreach($permissibles as $permissible) {
            $perms = $this->getPermissible($permissible);
            foreach($perms as $perm) {
                $permission->permissibles()->create([
                    'permissible_id' => $patientId, // patient ID
                    'is_accepted' => false,
                    'is_revoked' => false,
                    'permissible_type'  => $perm,
                ]);
            }
        }

        return $permission->load('permissibles');
    }

    private function getPermissible($permissible)
    {
        $data = [];
        switch ($permissible) {
            case 'information':
                $data = [
                    'App\\Models\\PatientAbuse',
                    'App\\Models\\PatientAlcoholDrug',
                    'App\\Models\\PatientCaffeine',
                    'App\\Models\\PatientCondition',
                    'App\\Models\\PatientDiet',
                    'App\\Models\\PatientHabit',
                    'App\\Models\\PatientStress',
                    'App\\Models\\PatientSurgery',
                    'App\\Models\\PatientTobacco',
                    'App\\Models\\PatientVital',
                    'App\\Models\\PatientInjury',
                ];
                break;
            
            case 'problems':
                $data = [    
                    'App\Models\PatientProblem',
                ];
                break;
            case 'medications':
                $data = [    
                    'App\Models\PatientMedication',
                ];
                break;
            case 'allergies':
                $data = [    
                    'App\Models\PatientAllergy',
                ];
                break;
            case 'laboratory':
                $data = [    
                    'App\Models\PatientLaboratory',
                ];
                break;
        }
        return $data;
    }
}
