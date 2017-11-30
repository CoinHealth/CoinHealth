<?php

namespace App\Notifications\Permissions;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\NotificationTrait;

class PatientDeniedRequest extends Notification implements ShouldQueue
{
    use Queueable, NotificationTrait;

    public $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sender = "You", $permission)
    {
        $this->data = [
            'sender' => $sender,
        	'permission' => $permission,
            'provider' => $permission->userProvider->full_name,
        ];
    }
}
