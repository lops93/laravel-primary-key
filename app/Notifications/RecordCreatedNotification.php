<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RecordCreatedNotification extends Notification
{
    use Queueable;
    public $record;
    public $user;
    public $name;

    /**
     * Create a new notification instance.
     */
    public function __construct($record, $user)
    {
        $this->name = $record->name;
        $this->record = $record;
        $this->user = $user;

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
            'user' => $this->user,
            'name' => $this->name,
            'action' => 'registered',
            'result' => 'successfully',
            'message' => $this->user.' registered '.$this->record->name. ' successfully',
        ];
    }
}
