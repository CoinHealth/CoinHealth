<?php namespace App\Http\Controllers\Directory;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\Category;
use App\Models\Location;
use App\Models\Directory;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use JavaScript;
use Hashids\Hashids;
use Hash;
use App\Jobs\Subscription\Subscribe;
use App\Jobs\Email\Credentials;
use App\Notifications\Directories\UserHasSavedProvider;

class DoctorController extends Controller {

	public function getIndex()
	{
		return view('directories.doctor.index');
	}

	public function postDoctor(Request $request)
	{
		$data = $request->except('_token');
		$user = auth()->user();
		$success = true;
		$provider = Provider::where('provider_id', $data['provider_id'])->first();
		// dd( $provider->user()->exists() );
		$dirData = [
			'saveable_id' => $data['provider_id'],
			'saveable_type' => 'App\Models\Provider',
			'user_id' => $user->id,
		];

		if ( $user->purpose == 1 ) {
			// $save = $user->directories()->attach($data['provider_id']);
			$save = Directory::create($dirData);
			// notify
			$type = 'Physician';
			$sender = $user->fullname;
			$patient_name = $user->fullname;
			$user->notify(new UserHasSavedProvider(
						'You',
						$type, 
						$provider->full_title, 
						$patient_name,
						$save
					) );

			if ( $provider->user()->exists() ) {
				$providerUser = $provider->user->first();
				$providerUser->notify(new UserHasSavedProvider(
						$sender,
						$type, 
						$provider->full_title, 
						$patient_name, 
						$save						
					));
			}
			$message = 'Successfully saved on your directory!';

		}
		elseif ( $user->purpose == 2 ) {
			if ($provider->user->contains($user->id)) {
				$message = "You have already claimed this Provider.";
				$success = false;
			}
			else {
				$save = $user->providers()->attach($data['provider_id']);
				$provider->update([]);
				$message = 'Listing successfully claimed!';
			}
		}

		if ($request->ajax())
			return response()->json([
				'success' => $success,
				'message' => $message,
			]);

		return redirect()->back()->with('message', $message);
	}

	public function getProvider($id)
	{
		$providers = Provider::where('provider_id', $id)->get();
		$provider_count = auth()->user() ? auth()->user()->providers->count() : 0;
		$directory = auth()->user() ? auth()->user()->directories->where('saveable_id', $id)->where('saveable_type', 'App\Models\Provider')->count() : 0;
    	return response()->json([
			'role' => auth()->check() ? auth()->user()->purpose : 0,
			'provider' => $providers,
			'provider_count' => $provider_count,
			'directory' => $directory,
		]);
    }

    public function createDoctor()
    {
    	if(auth()->user() && (auth()->user()->role == 2  || auth()->user()->role == 4) ) {
			$data= [
				'user'=> auth()->user(),
				'locations' => Location::state()->get(),
				'premiums' => Plan::where('type', 'premium-listing')->get(),
				'specializations' => Category::specializations()->get(),
			];
	    	return view('directories.doctor.create')->with($data);
		}
		else {
			return redirect('/directory/doctors');
		}
    }

    public function storeDoctor2(Request $request)
    {
		$data = $request->except('_token');
		$user = auth()->user();
		$data['name'] = $data['physician_first_name'] . ' ' . $data['physician_last_name'];
		$data['categories'] = ['Physicians'];
		$data['sub_categories'] = [];
		$data['type'] = 'Physician';
		$data['address']['state'] = Location::distinct('state_abbr')
							->where('state_abbr', $data['address']['state_abbreviated'])
							->first()->pretty_name;

//////////////////////////////////////////////////////////////

		$provider = new Provider();
		$provider = $provider->setKeyName('id');
		$provider->incrementing = true;
		$provider->setObjectIdKey('id');

		$provider->prefix = $data['prefix'];
		$provider->name = $data['name'];
		$provider->physician_first_name = $data['physician_first_name'];
		$provider->physician_last_name = $data['physician_last_name'];
		$provider->specialties = $data['specialties'];
		$provider->categories = $data['categories'];
		$provider->sub_categories = $data['sub_categories'];
		$provider->phone = $data['phone'];
		$provider->address = $data['address'];
		$provider->type = $data['type'];
		$provider->degree = $data['degree'];

///////////////////////////////////////////////////////////////

		if(isset($data['co_provider'])) {
			$hashids = new Hashids('bl0ckcha1n', 10);
			$data['provider_id'] = $hashids->encode([8,time()]);
			if($data['subscribe']) {
				// add user
				// send user credentials to email
				// add provider and claim
				// subscribe
				$countUser = 1;
				do {
					$rand = str_pad(mt_rand(0, 99), 2, '0', STR_PAD_LEFT);
					$username = strtolower(trim($data['physician_first_name'] )) . "." . strtolower(trim($data['physician_last_name'] )) . $rand;
					$countUser = User::where('username', $username)->get()->count();
				} while($countUser > 0);

				if($countUser == 0)
				{
					$newUser = [
						'first_name' => $data['physician_first_name'],
						'last_name' => $data['physician_last_name'],
						'username' => $username,
						'password' => Hash::make($data['provider_id']),
						'address' => $data['address'],
						'role' => 2,
						'email' => $data['co_provider_email'],
						'address' => $data['address'],
						'contact' => $data['phone'],
					];
					$createdUser = User::create($newUser);
					$credentials = [
			            'email' => $newUser['email'],
			            'name' => $newUser['first_name'] . ' ' . $newUser['last_name'],
			            'username' => $newUser['username'],
			            'password' => $data['provider_id'],
			        ];
          			dispatch(new Credentials($credentials));

					$saveProvider = $provider->create($data);
					$attach = $createdUser->providers()->attach($data['provider_id']);
					$saveProvider->update([]);
					$sub_process = dispatch(new Subscribe($request));
					if(isset($sub_process['success'])) {
						$message = 'Provider added. Your subscription has been confirmed.';
					}
					else {
						$message = 'Provider added.' . $sub_process;
					}
				}
			}
			else {
				// add to providers
				$provider->provider_id = $data['provider_id'];
				$save = $provider->save();
				$message = 'Provider added.';
			}
		}
		else {

			if($user->providers->count() > 0) {
				$data['provider_id'] = $user->providers->first()->provider_id;
			}
			else {
				$hashids = new Hashids('bl0ckcha1n', 10);
				$data['provider_id'] = $hashids->encode([8,time()]);
			}

			$provider->provider_id = $data['provider_id'];
			$save = $provider->save();
			// dd($save->provider_id);

			// $save = $provider->create($data);
			// dd($save);
			if($user->providers->count() == 0) {
				$claim = $user->providers()->attach($provider->provider_id);
			}

			if(isset($data['subscribe'])) {
				// https://stripe.com/docs/api?lang=php#create_card_token
	      		$sub_process = dispatch(new Subscribe($request));
				if(isset($sub_process['success'])) {
					$message = 'Provider added. Your subscription has been confirmed.';
				}
				else {
					$message = 'Provider added.' . $sub_process;
				}
			}
			else {
				$message = 'Provider added.';
			}
		}
		return redirect()->back()->with('message', $message);
    }

    public function storeDoctor(Request $request)
    {
    	$provider = new Provider();
		$provider = $provider->setKeyName('id');
    	$data = $request->except('_token');
		$user = auth()->user();
		dd($data);
		$data['name'] = $data['physician_first_name'] . ' ' . $data['physician_last_name'];
		if($user->providers->count() > 0) {
			$data['provider_id'] = $user->providers->first()->provider_id;
		}
		else {
			$hashids = new Hashids('bl0ckcha1n', 10);
			$data['provider_id'] = $hashids->encode([8,time()]);
		}
		$data['categories'] = ['Physicians'];
		$data['sub_categories'] = [];
		$data['type'] = 'Physician';
		$data['address']['state'] = Location::distinct('state_abbr')
							->where('state_abbr', $data['address']['state_abbreviated'])
							->first()->pretty_name;

		$save = $provider->create($data);

		if($user->providers->count() == 0) {
			$claim = $user->providers()->attach($save->provider_id);
		}

		if(isset($data['subscribe'])) {
			// https://stripe.com/docs/api?lang=php#create_card_token
      		$sub_process = dispatch(new Subscribe($request));
			if(isset($sub_process['success'])) {
				$message = 'Provider added. Your subscription has been confirmed.';
			}
			else {
				$message = 'Provider added.' . $sub_process;
			}
		}
		else {
			$message = 'Provider added.';
		}
		return redirect()->back()->with('message', $message);
    }

    public function checkEmail($email)
    {
    	$user = User::where('email', $email)->get();
    	return $user->count();
    }

}
