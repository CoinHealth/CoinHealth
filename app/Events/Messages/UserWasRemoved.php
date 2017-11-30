<?php

namespace App\Events\Messages;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\User;
use App\Models\Chat;

class UserWasRemoved implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $user;
    public $chat;
    public $owner;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Chat $chat, User $owner)
    {
        $this->user = $user;
        $this->chat = $chat;
        $this->owner = $owner;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('ChatRemoved');
    }
}
