<?php

namespace App\Notifications\Appointments;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\NotificationTrait;
class ProviderSuggestedAnAppointment extends Notification implements ShouldQueue
{
    use Queueable, NotificationTrait;

    public $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sender = "You", $appointment, $provider, $location, $patient)
    {
        $this->data = [
            "sender" => $sender,
            "appointment" => $appointment,
            "provider" => $provider,
            "location" => $location,
            "patient" => $patient,
        ];
    }
}
