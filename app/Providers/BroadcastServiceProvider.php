<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;
use App\Models\Chat;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        /*
         * Authenticate the user's personal channel...
         */
        Broadcast::channel('Activity.*', function ($user, $userId) {
            return (int) $user->id === (int) $userId;
        });

         /**
         * Authenticate user to join Room
         */
        Broadcast::channel('Chat.*', function ($user, $roomId) {
            $chat = $user->chats()->find($roomId);
            if ($user->canJoinRoom($roomId) && $chat->pivot->has_joined ) {
                return [
                    'chat' => $chat,
                    'user' => $user,
                ];
            }
            return false;
        });

        Broadcast::channel('ChatRemoved', function() {
            return true;
        });

        Broadcast::channel('ChatNew', function() {
            return true;
        });

        Broadcast::channel('ChatInvite', function() {
            return true;
        });
    }
}
