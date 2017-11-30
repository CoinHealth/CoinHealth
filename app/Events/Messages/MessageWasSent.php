<?php

namespace App\Events\Messages;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\ChatReply;

class MessageWasSent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $reply;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ChatReply $reply)
    {
        $this->dontBroadcastToCurrentUser();
        $this->reply = $reply;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */

    public function broadcastOn()
    {
        return new PresenceChannel('Chat.'.$this->reply->chat_id);
    }
}
