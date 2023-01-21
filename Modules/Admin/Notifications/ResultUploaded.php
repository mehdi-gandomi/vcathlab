<?php

namespace Modules\Admin\Notifications;

use Illuminate\Bus\Queueable;
use Modules\Panel\Notifications\BaseNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\UserVerification\Notifications\Channels\SMS;

class ResultUploaded extends BaseNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message,$title,$link="",$type="info",$icon="MessageSquareIcon")
    {
        parent::__construct($message,$title,$link,$type,$icon);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail',SMS::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mail= (new MailMessage)
                    ->line($this->message)
                    ->subject($this->title);
        if($this->link){
            $mail=$mail->action('Read more', $this->link);
        }
        return $mail;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return array_merge(parent::toArray($notifiable),[

        ]);
    }
    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toSMS($notifiable)
    {
        return [
            'message_type'=>'custom_message',
            'message'=>$this->message."\n For more information visit the following link: \n" .$this->link
        ];
    }
}
