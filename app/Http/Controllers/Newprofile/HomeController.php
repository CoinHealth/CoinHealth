<?php namespace App\Http\Controllers\Newprofile;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity;
use App\Models\Quote;
use App\Models\Agent;
use App\Models\Category;
use App\Models\Location;
use App\Commands\Email\EmailCommand;
//events
use App\Events\ProfileWasUpdated;
use App\Events\CelebratingAnniversary;
use App\Events\AskHealth;
use App\Events\UserGiveThanks;
use App\Events\UserFollows;

use SendGrid;

class HomeController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getProfile()
	{
		if (auth()->user()) {
			event(new CelebratingAnniversary(auth()->user()));
			event(new AskHealth(auth()->user()));
		}
		$questions= (object) \DB::table('health')->select('*')->get();
		$healthUser= \DB::table('health_user')->select('*')
							->where('user_id', auth()->user()->id )
							->get();
		if(!$healthUser){
			$data= ['questions' => $questions,];
		}else{
			$data= [
				'questions' => $questions,
				'healthUser' => (object) $healthUser,
			];
		}
		$data['user'] = auth()->user();

    // dd($data['user']->level);
    return view('main.profile2.index')->with($data);
	}

	public function getSettings()
	{
		return view('main.newprofile.profile-settings');
	}

	public function getLifeChangingEvents()
	{
		$quote = Quote::where('email', auth()->user()->email)->get()->first();
		$data= [
			'locations' => Location::state()->get(),
			'income_types' => Category::incomeType()->get(),
			'circumstances' => Category::exceptionalCircumstances()->get(),
			'tax_status' => Category::taxStatus()->get(),
			'quote' => $quote,
			//get agents email address
		];
		return view('main.newprofile.profile-event')->with($data);
	}

	public function postLifeChangingEvents(Request $request)
	{
		$data = $request->input('data');
		$data = json_decode($data);
		//dd($data);
		$email = $request->input('email');
		$quote = Quote::where('email', auth()->user()->email)->get()->first();
		//$agent = Quote::find($quote->id)->agent->get();
		//TODO: change to model
		$agent =  \DB::connection('mysql_crm')->table('users')
							->join('agent_quote', 'agent_quote.user_id' , '=', 'users.id')
							->where('agent_quote.quote_id', $quote->id)
							->get()[0];
		$to = $agent->email;
		$message = json_encode($data);
		$subject = 'CareParrot: Life Changing Events';
		$name = auth()->user()->fullname;

		$attachments = $request->file('attachFiles');
		$save  = Quote::where('email', $email)
							->update([
								'life_change_events' => json_encode($data),
							]);
		$reply = $this->dispatch(new EmailCommand('noreply@careparrot.com' , $to, $message, $name, $subject) );
	//	dd($reply);
		return response()->json(['success' => true, 'message' => 'Life Changing Events has been sent to your agent!']);
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
		];
		if ($username == auth()->user()->username)
			return redirect('/profile');
		// dd('shittt');
		return view('main.newprofile.overview')->with($data);
	}

	public function postFollow(Request $request)
	{
		if (auth()->user())
			event(new UserFollows(auth()->user()));
		$id= $request->input('followingID');
		$username= User::find($id)->username;
		\DB::table('user_user')
			->insert([
				'follower_id' => auth()->user()->id,
				'following_id' => $id,
			]);

		return [
			'followed_message' => 'you successfully followed ',
		];
	}

	public function postUnfollow(Request $request)
	{
		$id= $request->input('followingID');
		$username= User::find($id)->username;
		\DB::table('user_user')
			->where('follower_id', auth()->user()->id)
			->where('following_id', $id)
			->delete();
		return [
			'followed_message' => 'you unfollowed ',
		];
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

	public function postAvatar(Request $request)
	{
		$user = auth()->user();
		$imgDir = public_path().'/uploads/';
		$_file = $request->file('avatar');
		$file = uniqid().time() . '.' . $_file->getClientOriginalExtension();
		$move = $_file->move($imgDir, $file);
		$user->avatar = '/uploads/'.$file;
		$succcess= $user->save();
		Activity::create([
			'user_id' => auth()->user()->id,
			'from_url' => '/profile',
			'message' => 'Change Profile Picture.'
		]);
		if($succcess) {
			event(new ProfileWasUpdated(auth()->user()));
		}
		return redirect()->back();
	}

	public function getMessages()
	{
		return view('main.newprofile.messages.index');
	}

	public function postHealthQuestions(Request $request)
	{
		$user = auth()->user()->id;
		$answers = $request->input('answer');
		$timestamps= \Carbon\Carbon::now()->toDateTimeString();
		// active=> usersHealth status=>healthStatus
		foreach($answers as $key => $value){
			$save= \DB::table('health_user')
					->insert([
						'user_id' => $user,
						'health_id' => $key,
						'active' => $value,
						'timeline' => '0',
						'status' => '0',
						'created_at' => $timestamps,
						'updated_at' => $timestamps,
					]);
			// $save =
		}
		return redirect('/profile');
	}


}
