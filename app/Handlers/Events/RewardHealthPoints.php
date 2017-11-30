<?php namespace App\Handlers\Events;

use App\Events\UserIsAHealthAchiever;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Carbon\Carbon;

class RewardHealthPoints {

	
	public function __construct()
	{
		\DB::table('health_user')
			->where('user_id', auth()->user()->id)
			->get();
	}

	public function handle(UserIsAHealthAchiever $event)
	{
		$health= \DB::table('health_user')
			->where('user_id', auth()->user()->id)
			->where('health_id', $event->health->id)
			->get();

		$questionType= $event->health->type;
		$answer= $event->answer;
		$timeline= $health[0]->timeline;
		$timeline+=1;
		$userPoints= $health[0]->points;

		$benefits= json_decode($event->health->benefit_ids);
		$converted_points= json_decode($event->health->points);
		$points= 0;

		$bbb = \DB::table('benefits')
			->whereIn('id', $benefits)
			->get();
		if ($questionType == 0) { //passive question
			if($answer == "yes") {
				$timeline= 0;
				$status= 0;
			} else {
				if (isset($converted_points->$timeline)) {
					session()->flash('BenefitIDs', 'benefits');
					$earnedPoints = $converted_points->$timeline;
					$userPoints= $userPoints + $earnedPoints;
				}
				$status= 1;
			}
			\DB::table('health_user')
				->where('user_id', auth()->user()->id)
				->where('health_id', $event->health->id)
				->update([
					'timeline' => $timeline,
					'status' =>	$status,
					'points' => $userPoints,
					'updated_at' => Carbon::now(),
					]);
		} else { //active question
			if($answer == "yes") {
				//award
				if (isset($converted_points->$timeline)) {
					session()->flash('BenefitIDs', 'benefits');
					$earnedPoints = $converted_points->$timeline;
					$userPoints= $userPoints + $earnedPoints;
				}
				$status= 1;
			} else {
				$timeline= 0;
				$status= 0;
			}
			\DB::table('health_user')
				->where('user_id', auth()->user()->id)
				->where('health_id', $event->health->id)
				->update([
					'timeline' => $timeline,
					'status' =>	$status,
					'points' => $userPoints,
					'updated_at' => Carbon::now(),
					]);
		}


		session()->flash('HealthID', $event->health->id);
		session()->flash('Timeline', $timeline);
		if($timeline == 1)
			session()->flash('Day', 'day');
		else
			session()->flash('Day', 'days');
		session()->flash('HealthDescription', $event->health->title);
		session()->flash('PointsEarned', $userPoints);
		if($userPoints == 1)
			session()->flash('PointLabel', 'point earned');
		else
			session()->flash('PointLabel', 'points earned');
		
		session()->flash('BenefitName1', $bbb[0]->name);
		session()->flash('BenefitName2', $bbb[1]->name);
		session()->flash('BenefitName3', $bbb[2]->name);

		session()->flash('BenefitPath1', $bbb[0]->icon);
		session()->flash('BenefitPath2', $bbb[1]->icon);
		session()->flash('BenefitPath3', $bbb[2]->icon);
	
	}


}
