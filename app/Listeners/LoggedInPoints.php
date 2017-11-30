<?php

namespace App\Listeners;

use App\Events\UserWasLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\UserLog;
use App\Models\Point;
use App\Models\Gamification;
class LoggedInPoints
{
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  UserWasLoggedIn  $event
     * @return void
     */
    public function handle(UserWasLoggedIn $event)
    {
        $user = auth()->user();
        
        if ($user->role !== 0){
            // on user_logs
            // $saveLog = UserLog::create(['user_id' => auth()->user()->id]);
            // if last has same date same count
            // if datediff == 1 add else count == 1
            // if last is from last week then count == 1
            // if no award in 1,2,3

                // $user_id = auth()->user()->id;
            // $log = UserLog::where('user_id', $user_id)->get()->last();
            // dd( ($log->last_logged_on >= \Carbon\Carbon::today()->toDateString() ) );
            // count is same
            // $saveLog = UserLog::create(['user_id' => auth()->user()->id]);

            $earned = $user->points->where('created_at', '>=', \Carbon\Carbon::today()->toDateString() );
            $is_first = $user->first;
            if($is_first == 1) {
                // $user->first = 0;
                // $user->save();
                $game = Gamification::find(1);
                session()->flash('Points', $game->points);
                session()->flash('Award', $game->description);
                // transfer to jobs
                $data = [
                    'from_url' => '/auth/login',
                    'user_id' => $user->id,
                    'gamification_id' => $game->id,
                    'point' => $game->points,
                ];
                $save = Point::create($data);
            }
            else {
                // missing condition: for 3 consecutive days
                // if ($earned->where('gamification_id', 3)->count() == 0) {
                //     // weekly
                //     // add 1
                //     // count == 3

                // }
                // elseif ($earned->where('gamification_id', 2)->where('gamification_id', 3)->count() == 0) {
                if ($earned->where('gamification_id', 2)->count() == 0) {

                    $game = Gamification::find(2);
                    session()->flash('Points', $game->points);
                    session()->flash('Award', $game->description);
                    $data = [
                        'from_url' => '/auth/login',
                        'user_id' => $user->id,
                        'gamification_id' => $game->id,
                        'point' => $game->points,
                    ];
                    $save = Point::create($data);
                } 


            }

        } 

    }
}
