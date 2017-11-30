<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Premium;

use Illuminate\Http\Request;
class PaymentController extends Controller {

	public function postPayment(PaymentRequest $request)
    {
		$data = $request->except('_token');
		$days = $this->trial($data['subscription']);

		try {
			$user = auth()->user();
			$subscription = $user->newSubscription('ehr', $data['subscription'])
								->trialDays($days)
								->create($data['creditCardToken']);
			return response()->json([
				'data' => $subscription,
			]);
		} catch (Exception $e) {
			return response()->json($e);
		}

    }

	public function postCrm(PaymentRequest $request)
	{
		$data = $request->all();
		$user = auth()->user();
		$days = $this->trial($data['subscription']);

		if ($user->subscribed('ehr')) {
			return response()->json([
				'success' => false,
				'message' => "Looks like you have already subscribed to the Premium Listing",
			]);
		}

		try {
			$user = auth()->user();
			$subscription = $user->newSubscription('crm', $data['subscription'])
								->trialDays($days)
								->create($data['creditCardToken']);
			return response()->json([
				'success' => true,
				'message' => "",
			]);
		} catch (Exception $e) {
			return response()->json($e);
		}
	}

	public function postEhr(PaymentRequest $request)
	{
		$data = $request->all();
		$user = auth()->user();
		$days = $this->trial($data['subscription']);

		if ($user->subscribed('ehr')) {
			return response()->json([
				'success' => false,
				'message' => "Looks like you have already subscribed to the Premium Listing",
			]);
		}

		try {
			$user = auth()->user();
			$subscription = $user->newSubscription('ehr', $data['subscription'])
								->trialDays($days)
								->create($data['creditCardToken']);
			return response()->json([
				'success' => true,
				'message' => "",
			]);
		} catch (Exception $e) {
			return response()->json($e);
		}
	}

	public function postPremium(Request $request)
	{
		$data = $request->all();
		$user = auth()->user();
		if ($user->subscribed('premium-listing')) {
			return response()->json([
				'success' => false,
				'message' => "Looks like you have already subscribed to the Premium Listing",
			]);
		}

		try {

			$subscription = $user->newSubscription('premium-listing', $data['subscription'])
								->create($data['creditCardToken']);
			return response()->json([
				'success' => true,
				'data' => $subscription,
			]);
		} catch (Exception $e) {
			return response()->json($e);
		}
	}

	private function trial($plan)
	{
		$days = 7;
		$exc = ["ehr-vip","listing-annual","listing-monthly"];
		return in_array($plan, $exc) ?: $days;
	}

}
