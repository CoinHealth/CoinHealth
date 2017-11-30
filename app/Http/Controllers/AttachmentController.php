<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;
use Hashids\Hashids;
class AttachmentController extends Controller
{
    public function download($hashed_id, Attachment $attachment)
    {
        $hash = new Hashids(env('HASH_SALT'), 30);
        $attachment = $attachment->find($hash->decode($hashed_id)[0]);
        return response()->download(public_path($attachment->path), $attachment->title);
    }
}
