<?php namespace App\Handlers\Events;

use App\Events\UserGiveThanks;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\Models\Badge;

class AwardThankYouBadge {

	public $badge;

	public function __construct(Badge $badge)
	{
		$this->badge = $badge->find(10);
	}

	public function handle(UserGiveThanks $event)
	{
		$badge = $this->badge;
		$thankyouBadge = $event->user->badges()->find(10);

		if ($thankyouBadge) {
			$curLevel = $thankyouBadge->pivot->level;
			session()->flash('CurrentLevel', $curLevel);
			$nextLevel = ++$curLevel;
			++$thankyouBadge->pivot->progress;
			$thankyouBadge->pivot->save();
			if ($badge->converted_levels->$nextLevel == $thankyouBadge->pivot->progress) {
				++$thankyouBadge->pivot->level;
				$thankyouBadge->pivot->save();
				session()->flash('Badge', "");
				session()->flash('LeveledUp', $nextLevel);
				session()->flash('BadgeIcon', $badge->icon);
				session()->flash('CurrentLevel', $nextLevel);
			}
		}
		else {
			$event->user->badges()->attach( $this->badge, [
				'level' => 1,
				'progress' => 1,
			]);
			session()->flash('Badge', "");
			session()->flash('LeveledUp', "");
			session()->flash('BadgeIcon', $badge->icon);
			session()->flash('CurrentLevel', "1");
		}
	}

}
