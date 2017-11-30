<?php namespace App\Handlers\Events;

use App\Events\UserJoinNetworkProvider;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Models\Badge;

class AwardNetworkProviderBadge {

	public $badge;

	public function __construct(Badge $badge)
	{
		$this->badge = $badge->find(12);
	}

	public function handle(UserJoinNetworkProvider $event)
	{
		$badge = $this->badge;
		$providerBadge = $event->user->badges()->find(12);
	//	dd($providerBadge);
		if ($providerBadge) {
			$curLevel = $providerBadge->pivot->level;
			$nextLevel = ++$curLevel;

			++$providerBadge->pivot->progress;
			$providerBadge->pivot->save();
			if ($badge->converted_levels->$nextLevel == $providerBadge->pivot->progress) {
				++$providerBadge->pivot->level;
				$providerBadge->pivot->save();
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
