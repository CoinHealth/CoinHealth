<?php namespace App\Handlers\Events;

use App\Events\CelebratingAnniversary;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Carbon\Carbon;

use App\Models\Badge;

class AwardHappySecondAnniversaryBadge {

	public $badge;

	public function __construct(Badge $badge)
	{
		$this->badge = $badge->find(9);
	}

	public function handle(CelebratingAnniversary $event)
	{
		$badge = $this->badge;
		$anniversaryBadge = $event->user->badges()->find(9);
		$userCreated= $event->user->created_at;
		$now = new Carbon();
		$getYear= date_diff($now, $userCreated)->format('%y');

		if (!$anniversaryBadge) {
			if ($getYear == 2) {
				$event->user->badges()->attach( $this->badge, [
					'level' => 1,
					'progress' => 1,
				]);
				session()->flash('Badge', $badge->name);
				session()->flash('LeveledUp', "");
				session()->flash('BadgeIcon', $badge->icon);
			}
		}

	}

}
