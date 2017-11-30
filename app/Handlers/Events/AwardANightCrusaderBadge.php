<?php namespace App\Handlers\Events;

use App\Events\UserWasLoggedIn;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\Models\Badge;

class AwardANightCrusaderBadge {

	public $badge;

	public function __construct(Badge $badge)
	{
		$this->badge = $badge->find(3);
	}

	public function handle(UserWasLoggedIn $event)
	{
		$start1 = "22:00";
		$end1= "23:59";
		$start2= "00:00";
		$end2 = "04:00";
		$now = date("H:i");

		if ($now >= $start1 && $now <= $end1 || $now >= $start2 && $now < $end2 ) {

			$badge = $this->badge;
			$contactBadge = $event->user->badges()->find(3);

			if ($contactBadge) {
				$curLevel = $contactBadge->pivot->level;
				$nextLevel = ++$curLevel;

				++$contactBadge->pivot->progress;
				$contactBadge->pivot->save();
				if ($badge->converted_levels->$nextLevel == $contactBadge->pivot->progress) {
					++$contactBadge->pivot->level;
					$contactBadge->pivot->save();
					session()->flash('LeveledUp', "Level " . $nextLevel);
					session()->flash('Badge', $badge->name);
					session()->flash('BadgeIcon', $badge->icon);
				}
			}
			else {
				$event->user->badges()->attach( $this->badge, [
					'level' => 1,
					'progress' => 1,
				]);
				session()->flash('LeveledUp', "Level 1");
				session()->flash('Badge', $badge->name);
				session()->flash('BadgeIcon', $badge->icon);
			}

		}

	}

}
