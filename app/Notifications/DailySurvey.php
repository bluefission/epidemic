<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class DailySurvey extends Notification
{
    use Queueable;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        //
        $this->event = $event;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','nexmo'];
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

        // $url = url('/account/accept/'.$this->match->id);
        // $url = url('/account/accept/'.$this->match->id.'/0');

        return (new MailMessage)
                    ->subject('Daily Epidemiolgy Survey')
                    ->markdown('emails.dailysurvey', ['event' => $this->event]);
    }

    /**
     * Get the Nexmo / SMS representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return NexmoMessage
     */
    public function toNexmo($notifiable)
    {
        // $url = url('/account/accept/'.$this->match->id);

        return (new NexmoMessage)
                    ->content('There was an error. '.$this->event->job->getName());
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
            //
            'connection'=>$this->event->connectionName,
            'job'=>$this->event->job,
            'exception'=>$this->event->exception,
        ];
    }
}
