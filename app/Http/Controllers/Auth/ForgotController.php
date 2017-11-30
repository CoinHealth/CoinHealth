<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Commands\Email\EmailCommand;
class ForgotController extends Controller {

	public function getIndex()
	{
		return view('main.auth.forgot-password');
	}

	public function postIndex(Request $request, User $user)
	{
		$user = $user->where('email', $request->input('email'))->first();
		if (!$user) {
			return redirect()->back()->with([
				'message' => 'There is no Account registered in careparrot using '. $request->input('email'),
			]);
		}
		$password = uniqid();
		$email = $this->dispatch(new EmailCommand(
											'no-reply@careparrot.com',
											$request->input('email'),
											'Your new password is: <strong>'. $password . '</strong>',
											'CareParrot',
											'Forgot Password'));
		if ($email) {
			$user->password = Hash::make($password);
			$user->save();
			return redirect('/auth/login')->with([
				'forgot' => 'Change Successful',
			]);
		}
	}

}
