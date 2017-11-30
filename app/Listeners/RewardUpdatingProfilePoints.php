<?php

namespace App\Listeners;

use App\Events\ProfileWasUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Point;
use App\Models\Gamification;
class RewardUpdatingProfilePoints
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProfileWasUpdated  $event
     * @return void
     */
    public function handle(ProfileWasUpdated $event)
    {
        $user = auth()->user();
        if ($user->role !== 0) {
            $earned = $user->points->where('created_at', '>=', \Carbon\Carbon::today()->toDateString() );
            if ($earned->where('gamification_id', 4)->count() == 0) {
                $game = Gamification::find(4);
                session()->flash('Points', $game->points);
                session()->flash('Award', $game->description);
                $data = [
                    'from_url' => '/profile',
                    'user_id' => $user->id,
                    'gamification_id' => $game->id,
                    'point' => $game->points,
                ];
                $save = Point::create($data);
            } 
        } 
    }
}
