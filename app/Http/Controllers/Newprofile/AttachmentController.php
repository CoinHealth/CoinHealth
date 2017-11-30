<?php namespace App\Http\Controllers\NewProfile;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Attachment;
use Hashids\Hashids;

class AttachmentController extends Controller {

	public function view($id, Attachment $attachment)
	{
		$hash = new Hashids(env('HASH_SALT', 'c@r3p@rR0t'), 30);
		$id = $hash->decode($id)[0];
		$file = $attachment->find($id);
		return response()->download(public_path() . $file->path, $file->title);
	}
}
