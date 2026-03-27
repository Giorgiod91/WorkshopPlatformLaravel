<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Workshop;

class WorkshopsNotifications extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected Workshop $workshop)
    {
        //
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
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Hallo')
            ->line('Du nimmst an dem Workshop' . $this->workshop->title . 'teil.')
            ->action('Workshop ansehen', url('/workshops/'.$this->workshop->id))
            ->line('Viel Spaß bei dem Workshop!');

    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => $this->workshop->title,
            'url'=>url('/workshops/'. $this->workshop->id),
            'message' => 'Neuer Workshop',
        ];
    }
}
