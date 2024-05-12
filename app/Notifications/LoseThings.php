<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoseThings extends Notification
{
    use Queueable;

    private $user_found;
    private $found_id;
    private $lose_id;
    /**
     * Create a new notification instance.
     */
    public function __construct($user_found, $found_id, $lose_id)
    {
        $this->user_found = $user_found;
        $this->found_id = $found_id;
        $this->lose_id = $lose_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
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
            'user_found' => $this->user_found,
            'found_id' => $this->found_id,
            'lose_id' => $this->lose_id,
        ];
    }
}
