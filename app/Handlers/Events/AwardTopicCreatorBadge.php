<?php namespace App\Handlers\Events;

use App\Events\UserCreatedNewTopic;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Models\Badge;

class AwardTopicCreatorBadge {
	public $badge;

	public function __construct(Badge $badge)
	{
		$this->badge = $badge->find(13);
	}

	public function handle(UserCreatedNewTopic $event)
	{
		$badge = $this->badge;
		$creatorBadge = $event->user->badges()->find(13);
	//	dd($creatorBadge);
		if ($creatorBadge) {
			$curLevel = $creatorBadge->pivot->level;
			$nextLevel = ++$curLevel;

			++$creatorBadge->pivot->progress;
			$creatorBadge->pivot->save();
			if ($badge->converted_levels->$nextLevel == $creatorBadge->pivot->progress) {
				++$creatorBadge->pivot->level;
				$creatorBadge->pivot->save();
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
