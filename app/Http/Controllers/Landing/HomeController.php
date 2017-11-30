<?php namespace App\Http\Controllers\Landing;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use JavaScript;
use App\Models\Inquiry;
use Ramsey\Uuid\Uuid;
use App\Events\UserContactedUs;

class HomeController extends Controller {

	public function getIndex()
	{
		return view('main.landing.newlanding');
	}

	public function getTellme()
	{
		JavaScript::put([
			'stripe_key' => env('STRIPE_KEY', 'pk_test_YMuSpKzerGb71Kt5dBAmxahA'),
		]);
		return view('main.landing.tellme');
	}

	public function getContact()
	{
		return view('main.landing.contact');
	}

	public function postContact(Request $request)
	{
		$data = $request->except('_token');
		// dd($data);
		$data['uuid'] = Uuid::uuid4()->toString();
		// dd($data);
		$data['user_id'] = (auth()->user()) ? auth()->user()->id : null;
		$save = Inquiry::create($data);
		if(auth()->user() ) {
	        $event= event(new UserContactedUs(auth()->user()));
	    }
		return redirect()->back()->with('message', 'Thank you for contacting Careparrot! We\'ll get back to you shortly! ');
	}

}
