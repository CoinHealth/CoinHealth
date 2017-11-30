<?php namespace App\Handlers\Events;

use App\Events\UserGiveRatings;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\Models\Badge;

class AwardGiveRatingsBadge {

	public $badge;

	public function __construct(Badge $badge)
	{
		$this->badge = $badge->find(11);
	}

	public function handle(UserGiveRatings $event)
	{
		$badge = $this->badge;
		$rateBadge = $event->user->badges()->find(11);
		if ($rateBadge) {
			$curLevel = $rateBadge->pivot->level;
			$nextLevel = ++$curLevel;

			++$rateBadge->pivot->progress;
			$rateBadge->pivot->save();
			if ($badge->converted_levels->$nextLevel == $rateBadge->pivot->progress) {
				++$rateBadge->pivot->level;
				$rateBadge->pivot->save();
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
