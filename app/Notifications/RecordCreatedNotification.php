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
    public $record_name;
    public $record_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($record, $user)
    {
        $this->record_name = $record->name;
        $this->record_id = $record->id;
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
            'record_name' => $this->record_name,
            'record_id' => $this->record_id,
            'action' => 'registered',
            'result' => 'successfully',
            'message' => $this->user.' registered '.$this->record->name. ' successfully',
        ];
    }
}
