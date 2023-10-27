<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResendPasswordNotification extends Notification
{
    use Queueable;
    public $userEmail;
    public $password;
    public $username;

    /**
     * Create a new notification instance.
     */
    public function __construct($username,$userEmail,$password)
    {
        //
        $this->userEmail = $userEmail;
        $this->password = $password;
        $this->username = $username;
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
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('New password')
     
        ->greeting('Hello,'.$this->username)
        ->line('Your new password is: ' . $this->password)
        ->line('Please keep this password secure.')
        ->salutation('Regards,   DarMatrix Team');
    }

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
