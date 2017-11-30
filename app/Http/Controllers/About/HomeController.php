<?php namespace App\Http\Controllers\About;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Events\AskHealth;

use App\Http\Requests\About\ContactSendRequest;

use App\Commands\Email\EmailCommand;
class HomeController extends Controller {

	public function getIndex()
	{
		if(auth()->user())
      		event(new AskHealth(auth()->user()));
  		return view('main.about.index');
	}

	public function getKnow()
	{
		return view('main.about.know');
	}

	public function getKnow2()
	{
		return view('main.about.know-2');
	}

	public function getQuote()
	{
		if(auth()->user())
      		event(new AskHealth(auth()->user()));
		return view('main.about.quote');
	}

	public function getWhy()
	{
		return view('main.about.why');
	}

	public function getGuidelines()
	{
		return view('main.about.guidelines');
	}

	public function getCulture()
	{
		return view('main.about.culture');
	}

	public function getSustainability()
	{
		return view('main.about.sustainability');
	}

	public function getAbout()
	{
		return view('main.about.aboutus');
	}

	public function getGive()
	{
		if(auth()->user())
      		event(new AskHealth(auth()->user()));
      	return view('main.about.give');
	}

	public function getContact()
	{
		return view('main.about.contact');
	}

	public function getPrivacy()
	{
		return view('.main.about.privacy');
	}

	public function postContact(ContactSendRequest $request)
	{
		$data = $request->all();
		$to = 'help@careparrot.com';
		// $to = 'cathacosta95@gmail.com';
		$reply = $this->dispatch(new EmailCommand($data['email'] ,$to, $data['message'],$data['name'], $data['subject'] ) );
		if ($reply) {
			$return = [
				'success' => $reply,
				'message' => 'Thank you for contacting Careparrot! We\'ll get back to you shortly! ',
			];
			return redirect('/about/contact')->with($return);
		}
		// dd(config('services.sendgrid'));
	}
}
