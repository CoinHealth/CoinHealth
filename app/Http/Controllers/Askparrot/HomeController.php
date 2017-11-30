<?php namespace App\Http\Controllers\Askparrot;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Events\AskHealth;
use App\commands\AskParrot\GetSearchCommand;
class HomeController extends Controller {

	public function getIndex()
	{
		return view('main.askparrot.index');
	}

	public function getMarketplace()
	{
		return view('main.askparrot.marketplace');
	}

	public function getApplyEnroll()
	{
		return view('main.askparrot.applyenroll');
	}

	public function getMarketplacePlan() {
		return view('main.askparrot.marketplace-plan');
	}

	public function getMainspecialenroll() {
		return view('main.askparrot.mainspecialenroll');
	}

	public function getAboutus() {
		if(auth()->user())
      		event(new AskHealth(auth()->user()));
		return view('main.askparrot.aboutus');
	}

	public function postIndex(Request $request)
	{
		$searched = $this->dispatch(new GetSearchCommand($request->input('keyword')));
		return $searched;
	}
}
