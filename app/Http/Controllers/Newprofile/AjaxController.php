<?php namespace App\Http\Controllers\Newprofile;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attachment;
use Hash;
// events
use App\Events\ProfileWasUpdated;
use App\Events\FileWasUploaded;
class AjaxController extends Controller {


	public function postFollow(Request $request)
	{
		$data = $request->input();
		$authed = auth()->user();
		$before = $authed->following()->count();
		$authed = $authed->following()->attach($data['following_id']);
		$after = $authed->following()->count();
		return response()->json([
			'success' => ($after > $before),
		]);
	}

	public function postSettings(Request $request)
	{
		$data = $request->except('_token');
		$user = auth()->user();
		if ($data['name'] === "password") {
			$pattern = '/^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{8,}$/';
			$isValid = preg_match($pattern, $data['value']);
			if (!$isValid) {
				return response()->json([
					'success' => 'failed',
					'user' => $user,
				]);
			}
			$data['value'] = Hash::make($data['value']);
		}
		// $user->update([
		// 	'fname' => 'shit',
		// ]);
		$suc = $user->update([
			$data['name'] => $data['value'],
		]);
		if ($suc) {
			event(new ProfileWasUpdated(auth()->user()));
		}
		return response()->json([
			'success' => $suc,
			'user' => $user,
		]);
	}

	public function postDeleteAccount(Request $request)
	{
		if ($request->input('action') == 'delete') {
			$user = auth()->user()->delete();
			return response()->json([
				'user' => $user,
				'success' => $user,
			]);
		}
	}

	public function postAttachment(Request $request, Attachment $attachment)
	{
		$attachments = $request->file('attachments');
		$destinationPath = public_path() . '/uploads/attachments/';
		foreach($attachments as $file) {
			$ext = $file->getClientOriginalExtension();
			$rnd = date('Y-m-d-H-i-s') . uniqid();
			$upload_file = $rnd .'.'. $ext;
			$success = $file->move($destinationPath, $upload_file);
			if ($success) {
				$attachment->create([
					'user_id' => auth()->user()->id,
					'title' => $file->getClientOriginalName(),
					'path' => '/uploads/attachments/'.$upload_file,
					'mime_type' => $file->getClientMimeType(),
				]);
			}
		}
		if($attachments) {
			event(new FileWasUploaded(auth()->user()));
		}
	}


}
