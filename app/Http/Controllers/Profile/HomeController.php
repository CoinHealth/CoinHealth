<?php namespace App\Http\Controllers\Profile;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Provider;
use App\Models\User;
use App\Models\Attachment;
use App\Models\Appointment;
use App\Models\EhrLead;
use App\Events\UserFollows;
use App\Events\ProfileWasUpdated;
use Illuminate\Http\Request;
use Image;
use File;
use Hashids\Hashids;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex()
	{

		$user = auth()->user();
		$ids = [];
		foreach ($user->providers as $key => $value) {
			array_push($ids, array($value->id));
		}
		$activities = [];
		if($user->role == 1) {
			$activities = $user->patientRequest;
		}
		else if($user->role == 2) {
			// $activities = $user->doctorActivity();
			$activities = EhrLead::whereIn('provider_id', $ids )->get();
		}
		view()->share([
			'user' => $user,
			'view' => 'timeline',
			'activities' => $activities,
		]);
		// dd($activities->first() );
		return view('profile.index');
	}

	public function getDoctor ()
	{
		return auth()->user();
	}

	public function saveSignature(Request $request)
	{
		$data = $request->get('signature');
		$user  = auth()->user();

		$imageData = Image::make($data);
		$hasher = new Hashids(env('HASH_SALT'), 20);
		$hashed = $hasher->encode($user->id);

		$imagePath = "/uploads/signatures/{$hashed}.png";
		$image = $imageData->save(public_path().$imagePath);

		$attachment = Attachment::create([
			'user_id' => $user->id,
			'title' => $user->full_name . ' signature',
			'path' => $imagePath,
			'mime_type' => $image->mime(),
			'file_type' => 7,
		]);

		$signature = $user->signature()->save($attachment);
		return response()->json([
			'success' => boolval($signature)
		]);

	}

	public function update(Request $request)
	{
		$patient = auth()->user()->patient;
		$update = $patient->update($request->input('crm_fields'));
		return response()->json([
			'success' => $update,
			'patient' => $patient,
		]);
	}

	public function postUpdateCrm(Request $request)
	{
		$user = auth()->user();
		$user->crm_fields = $request->input('crm_fields');
		$success = $user->save();
		return response()->json([
			'success' => $success,
			'user' => $user,
		]);
	}
	public function getPatientInfo()
	{
		$user = auth()->user();
		$user = $user->load(['patient', 'signature']);
		if (!$user->patient->current_address) {
			$user->patient->current_address = [
				'street_1' => '',
				'street_2' => '',
				'city' => '',
				'state' => '',
				'zip' => '',
			];
		}
		if (!$user->patient->billing_address) {
			$user->patient->billing_address = [
				'street_1' => '',
				'street_2' => '',
				'city' => '',
				'state' => '',
				'zip' => '',
			];
		}
		$user->patient->marital_status = $user->marital_status;
		return response()->json([
			'user' => $user,
		]);
	}

	public function getProviderInfo()
	{
		$user = auth()->user();
		$data['user'] = $user->load('signature');
		$data['providers'] = $user->providers;
		$data['user']['job_title'] = $data['providers'][0]->pivot->job_title;

		return response()->json($data);
	}

	public function getAgentInfo()
	{
		$user = auth()->user();
		return response()->json([
			'user' => $user->load(['agent', 'signature']),
		]);
	}

	public function postPatientInfo(Request $request)
	{
		$user = auth()->user();
		$data = array_only($request->input('data'), [
			'ssn',
			'gender',
			'race',
			'dob',
			'contact_home',
			'contact_work',
			'contact_cell',
			'current_address',
			'billing_address',
			'email',
			'preferred_communication',
            'employer',
            'spouse_name',
            'spouse_dob',
            'responsible_party',
            'parent_status',
            'referring_physician',
            'primary_care_physician',
            'pharmacy',
            'emergency_contact_person',
	        'emergency_contact_relation',
	        'emergency_contact_no',
		]);
		$success = $user->patient->update($data);
		$success = $user->update([
				'marital_status' => $request->input('data')['marital_status'],
				'email' => $request->input('data')['email'],
			]);
		$event = event(new ProfileWasUpdated(auth()->user()));

		return response()->json([
			'success' => $success,
			'user' => $user->load('patient'),
		]);
	}

	public function postProviderInfo(Request $request)
	{
		$user = auth()->user();
		$data = $request->input('data')['user'];
		$pivot = [
			'job_title' => $data['job_title'],
			'provider_id' => $data['providers'][0]['provider_id'],
		];
		$success = $user->providers()->updateExistingPivot($pivot['provider_id'], [
			'job_title' => $pivot['job_title'],
		]);
		$event = event(new ProfileWasUpdated(auth()->user()));

		return response()->json([
			'success' => $success,
			'user' => $user,
		]);
	}

	public function postAgentInfo(Request $request)
	{
		$user = auth()->user();
		$user->patient()->update($request->input('data'));
		$success = $user->save();
		$event = event(new ProfileWasUpdated(auth()->user()));
		return response()->json([
			'success' => $success,
			'user' => $user,
		]);
	}

	public function updateProvider(Request $request, Provider $provider)
	{
		$user = auth()->user();
		$data = $request->only([
			'address',
			'phone',
			'operation_hours'
		]);
		$data['address'] = json_encode($data['address']);
		$provider = Provider::whereId($request->input('id'));
		$update = $provider->update($data);
		$event = event(new ProfileWasUpdated(auth()->user()));

		return response()->json([
			'success' => $update,
			'provider' => $provider->first(),
		]);
	}

	public function deleteProvider(Request $request)
	{
		$user = auth()->user();
		return $request->all();
	}

	public function getCRMFields()
	{
		$user = auth()->user();
		$crmFields = [];
		if ($user->role == 1) {
			$user->load('patient');
			$crmFields['location'] = $user->patient->current_address;
		}
		else if ($user->role == 2 || $user->role == 4) {
			$user->load('providers');
		}
		return response()->json([
			'user' => $user,
			'crmFields' => $crmFields,
		]);
	}

	public function getMedical()
	{
		view()->share([
			'user' => auth()->user(),
			'view' => 'timeline',
		]);
		return view('profile.medical.index');
	}

	public function getVisitor()
	{
		view()->share([
			'user' => auth()->user(),
			'view' => 'timeline',
		]);
		return view('main.profile2.visitor');
	}

	public function getDocuments()
	{
		view()->share([
			'user' => auth()->user(),
			'view' => 'timeline',
		]);
		$data = [

		];
		return view('main.profile2.documents')->with($data);
	}

	public function postAvatar(Request $request)
	{
		$file = $request->file('avatar');

		$user = auth()->user();
		$path = $file->store('avatars');

		$avatar = Attachment::create([
			'user_id' => $user->id,
			'title' => $file->getClientOriginalName(),
			'path' => "/uploads/{$path}",
			'mime_type' => $file->getClientMimeType(),
			'file_type' => 1
		]);
		$user->attachments()->save($avatar);
		// gamification
		$event = event(new ProfileWasUpdated(auth()->user()));
		$points = session()->get('Points') ? session()->get('Points') : '';
		$award = session()->get('Award') ? session()->get('Award') : '';
		session()->forget('Points');
		session()->forget('Award');
		// dd(session()->all() );
		// $points = $event[0]['Points'] ? $event[0]['Points'] : '';
		// $award = $event[0]['Award'] ? $event[0]['Award'] : '';
		return response()->json([
			'success' => true,
			'path' => $user->avatar_path,
			'points' => $points,
			'award' => $award,
		]);
	}

	public function getOverview($username)
	{
		$selector =  ($username * 1) > 0 ? 'id' : 'username';
		$user= User::where($selector, $username)->first();
		if (!$user)
		return redirect()->back();
		if ($selector == 'id')
		return redirect('/profile/overview/'.$user->username);

		$follows= \DB::table('user_user')
		->where('following_id', $user->id)
		->where('follower_id', auth()->user()->id)
		->get();
		$enable = 'true';
		if (empty(!$follows))
		$enable= 'false';
		$data = [
			'user' => $user,
			'enable' => $enable,
			'view' => 'overview',
		];
		if ($username == auth()->user()->username)
			return redirect('/profile');
		return view('main.profile2.overview')->with($data);
	}

	public function getSettings()
	{
		view()->share([
			'user' => auth()->user(),
			'view' => 'timeline',
		]);
		return view('main.profile2.settings');
	}

	public function postFollow(Request $request)
	{
		if (auth()->user())
			event(new UserFollows(auth()->user()));
		// $id= $request->input('followingID');
		// $username= User::find($id)->username;
		// \DB::table('user_user')
		// 	->insert([
		// 		'follower_id' => auth()->user()->id,
		// 		'following_id' => $id,
		// 	]);
		//
		//
		// return [
		// 	'followed_message' => 'you successfully followed ',
		// ];
		auth()->user()->following()->attach($request->input('followingID'));
		return redirect()->back();
	}

	public function postUnfollow(Request $request)
	{
		// $id= $request->input('followingID');
		// $username= User::find($id)->username;
		// \DB::table('user_user')
		// 	->where('follower_id', auth()->user()->id)
		// 	->where('following_id', $id)
		// 	->delete();
		//
		// return [
		// 	'followed_message' => 'you unfollowed ',
		// ];
		auth()->user()->following()->detach($request->input('followingID'));
		return redirect()->back();
	}

	public function postThankYou(Request $request)
	{
		$id= $request->input('receiverID');
		if (auth()->user())
			event(new UserGiveThanks(User::find($id)));
		$progress= session()->get('CurrentLevel');
		$username= User::find($id)->username;
		\DB::table('badge_thank_you')
			->insert([
				'sender_id' => auth()->user()->id,
				'receiver_id' => $id,
				'receiver_progress' => $progress,
			]);
		return redirect("/profile/overview/".$username);
	}
}
