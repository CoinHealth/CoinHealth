<?php

namespace App\Notifications\TeamBuilder;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\NotificationTrait;

class InvitationWasAccepted extends Notification implements ShouldQueue
{
    use Queueable, NotificationTrait;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
}
