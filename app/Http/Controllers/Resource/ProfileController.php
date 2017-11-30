<?php namespace App\Http\Controllers\Resource;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\Profile\AvatarRequest;
class ProfileController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
    	$data = [
    		'user' => auth()->user(),
    	];
        return view('main.profile.index')->with($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function postAvatar(AvatarRequest $request)
	{
		$user = auth()->user();
		$imgDir = public_path() . '/uploads/';
		$_file = $request->file('avatar');
		$file = uniqid().time() . '.' . $_file->getClientOriginalExtension();
		$move = $_file->move($imgDir, $file);
		$user->avatar = $file;
		$user->save();
		return redirect()->back();
	}
}
