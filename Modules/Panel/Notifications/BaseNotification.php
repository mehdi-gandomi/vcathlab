<?php

namespace Modules\Panel\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Notifications\Messages\BroadcastMessage;

class BaseNotification extends Notification
{
    use Queueable,InteractsWithSockets;
    public $message;
    public $title;
    public $type;
    public $icon;
    public $link;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message,$title,$link="",$type="info",$icon="MessageSquareIcon")
    {
        $this->message=$message;
        $this->title=$title;
        $this->type=$type;
        $this->icon=$icon;
        $this->link=$link;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', 'https://laravel.com')
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message'=>$this->message,
            'title'=>$this->title,
            'link'=>$this->link,
            'type'=>$this->type,
            'icon'=>$this->icon
        ];
    }

   public function toBroadcast($notifiable)
   {
       return new BroadcastMessage($this->toArray($notifiable));
   }
   /**
     * Get the type of the notification being broadcast.
     *
     * @return string
     */
    public function broadcastType()
    {
        return \Str::snake(basename(get_class($this)));
    }

}
