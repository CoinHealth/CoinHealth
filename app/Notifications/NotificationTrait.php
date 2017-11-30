<?php 

namespace App\Notifications;

trait NotificationTrait
{
	/**
	 * Send to database and broadcast
	 * @param  [type] $notifiable 
	 * @return [type]             array
	 */
	public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->data;
    }

    /**
     * Get the array representation inside `data` of the notification.
     * @param  mixed  $notifiable
     * @return array
     */
    public function toBroadcast($notifiable)
    {
        return [
            "data" => $this->data,
        ];
    }
}