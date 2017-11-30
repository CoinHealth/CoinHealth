<?php namespace App\Handlers\Events;

use App\Events\AskHealth;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Carbon\Carbon;

class ShowHealthCounter {

	public function __construct()
	{
		\DB::table('health_user')
			->where('user_id', auth()->user()->id)
			->get();
	}

	public function handle(AskHealth $event)
	{
		$now = new Carbon();
		$now= $now->format('Y-m-d');

		$healthDatas= \DB::table('health_user')
				->join('health', 'health.id',  '=', 'health_user.health_id')
				->where('health_user.user_id', auth()->user()->id)
				->where('health_user.active', '1')
				->get();

		foreach($healthDatas as $healthData){
			$updatedAt= date('Y-m-d', strtotime($healthData->updated_at));
			if ($now != $updatedAt){
				session()->flash('HealthID', $healthData->id);
				session()->flash('QuestionType', $healthData->type);
				session()->flash('HeaderQuestion', $healthData->question_header);
				session()->flash('Description', $healthData->description);
				break;
			}
		}
	}

}
