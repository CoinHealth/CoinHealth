<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\MedicalDoctor;
use App\Models\Medication;
use App\Models\MedicalFacility;

use Illuminate\Http\Request;

class BookmarkController extends Controller {

	protected $user;

	public function __construct()
	{
		$this->middleware('auth');
		$this->user = auth()->user();
	}

	public function medication(Request $request)
	{
		$id = $request->input('id');
		$medication = Medication::find($id);

		if (!auth()->user()->bookmarks->contains($medication)) {
			$medication->bookmarkItem();
			return response()->json([
				'success'=>'OK',
				'message'=>'bookmarked',
				'id'=>$id,
			]);
		}
		return response()->json([
			'success'=>'FAILED',
			'message'=>'already bookmarked',
			'id'=>$id,
		]);
	}

	public function facility(Request $request)
	{
		$id = $request->input('id');
		$facility = MedicalFacility::find($id);
		if (!auth()->user()->bookmarks->contains($facility)) {
			$facility->bookmarkItem();
			return response()->json([
				'success'=>'OK',
				'message'=>'bookmarked',
				'id'=>$id,
			]);
		}
		return response()->json([
			'success'=>'FAILED',
			'message'=>'already bookmarked',
			'id'=>$id,
		]);
	}

	public function doctor(Request $request)
	{
		$id = $request->input('id');
		$doctor = MedicalDoctor::find($id);

		if (!auth()->user()->bookmarks->contains($doctor)) {
			$doctor->bookmarkItem();
			return response()->json([
				'success'=>'OK',
				'message'=>'bookmarked',
				'id'=>$id,
			]);
		}
		// $doctor->unbookmarkItem();
		return response()->json([
			'success'=>'FAILED',
			'message'=>'already bookmarked',
			'id'=>$id,
		]);
	}
}
