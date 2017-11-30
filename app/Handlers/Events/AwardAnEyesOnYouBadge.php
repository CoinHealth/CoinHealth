<?php namespace App\Handlers\Events;

use App\Events\UserFollows;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Models\Badge;

class AwardAnEyesOnYouBadge {

	public $badge;

	public function __construct(Badge $badge)
	{
		$this->badge = $badge->find(7);
	}

	public function handle(UserFollows $event)
	{
		$badge = $this->badge;
		$followBadge = $event->user->badges()->find(7);
		//dd($followBadge);

		if ($followBadge) {
			$curLevel = $followBadge->pivot->level;
			$nextLevel = ++$curLevel;
			++$followBadge->pivot->progress;
			$followBadge->pivot->save();
			if ($badge->converted_levels->$nextLevel == $followBadge->pivot->progress) {
				++$followBadge->pivot->level;
				$followBadge->pivot->save();
				// session()->flash('Badge', $badge->name);
				// session()->flash('LeveledUp', $nextLevel);
				// session()->flash('BadgeIcon', $badge->icon);
			}
		}
		else {
			$event->user->badges()->attach( $this->badge, [
				'level' => 1,
				'progress' => 1,
			]);
			// session()->flash('Badge', $badge->name);
			// session()->flash('LeveledUp', "");
			// session()->flash('BadgeIcon', $badge->icon);
		}
	}

}
