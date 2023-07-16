<?php

namespace App\Notifications;

use App\Mail\EventMail;
use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendingNotification extends Notification
{
    use Queueable;
    protected $event;

    /**
     * Create a new notification instance.
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable)
    {
        return (new EventMail($this->event))->to($notifiable->email);
    }

    // public function toMail(object $notifiable): MailMessage
    // {
    //     // $url = url('/invoice/'.$this->invoice->id);

    //     return (new MailMessage)
    //         ->greeting('Hello!')
    //         ->line('One of your invoices has been paid!')
    //         ->line('Thank you for using our application!');
    // }




    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}