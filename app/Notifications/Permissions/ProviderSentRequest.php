<?php

namespace App\Notifications\Permissions;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\NotificationTrait;
class ProviderSentRequest extends Notification implements ShouldQueue
{
    use Queueable, NotificationTrait;

    public $data;

    /**
     * Construct $data
     *
     * @return void
     */
    public function __construct($permission, $sender = "You", $patient = null)
    {
        $this->data = [
            "sender" => $sender,
            "permission" => $permission->load('permissibles'),
            "patient" => $patient,
        ];
    }
}
