<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $details;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail', 'database'];
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->details['user_id'],
            'body' => $this->details['body'],
            'actionURL' => $this->details['actionURL'],
        ];
    }
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');

        return (new MailMessage)
            ->subject('Notification Subject')
            //->greeting('Hello!')
            ->greeting($this->details['greeting'])
            //->line('The introduction to the notification.')
            ->line($this->details['body'])
            //->action('Notification Action', url('/'))
            ->action($this->details['actionText'], $this->details['actionURL'])
            //->line('Thank you for using our application!');
            ->line($this->details['thanks']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //'data' => 'this is my notification',
            'id' => $this->id,
            'read_at' => null,

            'actionURL' => $this->details['actionURL'],
            'user_id' => $this->details['user_id'],
            'data' => [
                'follower_id' => $this->details['user_id'],
                'data' => $this->details['data'],
            ],
        ];
    }
}
