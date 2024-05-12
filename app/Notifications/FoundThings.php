<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FoundThings extends Notification
{
    use Queueable;

    private $user_missing;
    private $found_id;
    private $lose_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($user_missing, $found_id, $lose_id)
    {
        $this->user_missing = $user_missing;
        $this->found_id = $found_id;
        $this->lose_id = $lose_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

   
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'user_missing' => $this->user_missing,
            'found_id' => $this->found_id,
            'lose_id' => $this->lose_id,
        ];
    }
}
