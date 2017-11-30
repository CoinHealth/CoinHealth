<?php

namespace App\Notifications\Directories;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\NotificationTrait;
class UserHasSavedProvider extends Notification implements ShouldQueue
{
    use Queueable, NotificationTrait;

    public $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sender = 'You', $type, $provider, $patient_name, $directory)
    {
        $this->data = [
            "sender" => $sender,
            "type" => $type,
            "provider" => $provider,
            "patient_name" => $patient_name,
            "directory" => $directory,
        ];
    }

   

}
