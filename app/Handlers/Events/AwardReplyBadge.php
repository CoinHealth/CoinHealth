<?php namespace App\Handlers\Events;

use App\Events\UserReplyToTopics;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Models\Badge;

class AwardReplyBadge {

	public $badge;

	public function __construct(Badge $badge)
	{
		$this->badge = $badge->find(14);
	}

	public function handle(UserReplyToTopics $event)
	{
		$badge = $this->badge;
		$replyBadge = $event->user->badges()->find(14);
		//dd($replyBadge);
		if ($replyBadge) {
			$curLevel = $replyBadge->pivot->level;
			$nextLevel = ++$curLevel;

			++$replyBadge->pivot->progress;
			$replyBadge->pivot->save();
			if ($badge->converted_levels->$nextLevel == $replyBadge->pivot->progress) {
				++$replyBadge->pivot->level;
				$replyBadge->pivot->save();
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
