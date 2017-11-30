<?php

namespace App\Notifications\Permissions;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\NotificationTrait;
class PatientApprovedRequest extends Notification implements ShouldQueue
{
    use Queueable, NotificationTrait;

    public $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sender, $permission, $provider, $url = '')
    {
        $this->data = [
            "sender" => $sender,
            "permission" => $permission,
            "provider" => $provider,
            "url" => $url,
        ];
    }
}
