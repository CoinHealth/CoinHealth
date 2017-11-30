<?php namespace App\Handlers\Events;

use App\Events\FileWasUploaded;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Models\Badge;

class AwardUploadedFileBadge {

	public $badge;

	public function __construct(Badge $badge)
	{
		$this->badge = $badge->find(5);
	}

	public function handle(FileWasUploaded $event)
	{
		$badge = $this->badge;
		$loginBadge = $event->user->badges()->find(5);
		if ($loginBadge) {
			$curLevel = $loginBadge->pivot->level;
			$nextLevel = ++$curLevel;
			//dd(++$curLevel);

			++$loginBadge->pivot->progress;
			$loginBadge->pivot->save();
			if ($badge->converted_levels->$nextLevel == $loginBadge->pivot->progress) {
				++$loginBadge->pivot->level;
				$loginBadge->pivot->save();
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
