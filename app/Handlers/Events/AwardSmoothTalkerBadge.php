<?php namespace App\Handlers\Events;

use App\Events\CreatedNewThread;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\Models\Badge;

class AwardSmoothTalkerBadge {

	public $badge;

	public function __construct(Badge $badge)
	{
		$this->badge = $badge->find(6);
	}

	public function handle(CreatedNewThread $event)
	{
		$badge = $this->badge;
		$threadBadge = $event->user->badges()->find(6);
	//	dd($threadBadge);
		if ($threadBadge) {
			$curLevel = $threadBadge->pivot->level;
			$nextLevel = ++$curLevel;

			++$threadBadge->pivot->progress;
			$threadBadge->pivot->save();
			if ($badge->converted_levels->$nextLevel == $threadBadge->pivot->progress) {
				++$threadBadge->pivot->level;
				$threadBadge->pivot->save();
				session()->flash('Badge', $badge->name);
				session()->flash('LeveledUp', "Level " . $nextLevel);
				session()->flash('BadgeIcon', $badge->icon);
			}
		}
		else {
			$event->user->badges()->attach( $this->badge, [
				'level' => 1,
				'progress' => 1,
			]);
			session()->flash('Badge', $badge->name);
			session()->flash('LeveledUp', "Level 1");
			session()->flash('BadgeIcon', $badge->icon);
		}
	}

}
