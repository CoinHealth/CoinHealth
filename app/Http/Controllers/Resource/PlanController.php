<?php namespace App\Http\Controllers\Resource;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Event;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PlanController extends Controller {

	public function getIndex()
	{
		$open_enrollment_period = Event::where('code', '0000000001')->first();
		$data = [
			'open_enrollment_period' => $open_enrollment_period,
			'now' => Carbon::now(),
			'lose_or_losing_coverage' => [
				'from' => $open_enrollment_period->to->addDay(),
				'to' => $open_enrollment_period->from->subDay(),
			],
			'tax_status' => Category::taxStatus()->get(),
			'income_types' => Category::incomeType()->get(),
			'immigration_documents' => Category::immigrationDocuments()->get(),
			'locations' => Location::state()->get(),
			'credit_card_expiration' => [
				'start' => date('Y') - 5,
				'end' => date('Y') + 5,
			],
		];
		return view('main.find-plan.index')->with($data);
	}

}
