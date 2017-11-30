<?php namespace App\Http\Controllers\Community;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Location;
class HomeController extends Controller {

	public function getCommunity()
	{
		return view('main.community.index');
	}

	public function getGameon()
	{
		return view('main.community.gameon');
	}

	public function getProfile()
	{
		return view('main.community.profile');
	}

	public function getBadges()
	{
		return view('main.community.badges');
	}

	public function getCommunityEW()
	{
		return view('main.community.community-ew');
	}

	public function getEast()
	{
		$authed_id = auth()->check() ? auth()->user()->id : 0;

		$members = User::join('locations' , 'locations.id', '=', 'users.location_id')
							->where('users.id', '!=', $authed_id)
							->where('users.is_public', '=', '1')
							->where('locations.coast', '=', '1')
							->get();
		$data = [
			'members' => $members,
		];
		return view('main.community.east')->with($data);
	}

	public function getWest()
	{
		$authed_id = auth()->check() ? auth()->user()->id : 0;
		$members = User::join('locations' , 'locations.id', '=', 'users.location_id')
							->where('users.id', '!=', $authed_id)
							->where('users.is_public', '=', '1')
							->where('locations.coast', '=', '0')
							->get();
		$data = [
			'members' => $members,
		];
		return view('main.community.west')->with($data);
	}

	public function getCarecommunity()
	{
		if (auth()->check())
			return redirect('/community/category');
		return view('main.community.carecommunity');
	}

	public function getSpecialization()
	{
		if (auth()->check())
			return redirect('/community/category');
		return view('main.community.community-specialization');
	}

	public function getSetup()
	{
		if (auth()->check())
			return redirect('/community/category');
		return view('main.community.community-setup');
	}

	public function getState()
	{
		if (auth()->check())
			return redirect('/community/category');
		$locations = Location::groupBy('state_abbr')->get();
		$data = [
			'locations' => $locations,
		];
		return view('main.community.community-state')->with($data);
	}

	public function getCategory()
	{
		return view('main.community.category');
	}

	public function getMemberList()
	{
		$data = [
			'users' => User::all(),
		];
		if (auth()->check()) {
			$data = [
				'users' => User::where('id', '!=', auth()->user()->id)->get(),
			];
		}
		return view('main.community.list')->with($data);


	}

}
