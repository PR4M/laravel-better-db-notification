<?php

namespace App\Notifications\Auth;

use App\User;
use Illuminate\Bus\Queueable;
use App\App\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\App\Notifications\Channels\DatabaseChannel;

class UserJoined extends Notification
{
    use Queueable;

    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            DatabaseChannel::class
        ];
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
            'user' => [
                'id' => $this->user->id
            ]
        ];
    }
}
