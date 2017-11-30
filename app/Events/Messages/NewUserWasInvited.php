<?php

namespace App\Events\Messages;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Chat;
use App\Models\User;

class NewUserWasInvited implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $invited;
    public $invitee;
    public $conversation;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $invited, User $invitee = null, Chat $conversation)
    {
        $this->invited = $invited;
        $this->invitee = $invitee;
        $this->conversation = $conversation;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('ChatInvite');
    }
}
