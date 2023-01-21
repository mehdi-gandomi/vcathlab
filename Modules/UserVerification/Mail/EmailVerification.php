<?php

namespace Modules\UserVerification\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $code;
    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code,$user=null)
    {
        $this->code = $code;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data=['code'=>$this->code];
        if($this->user != null){
            $data["user"]=$this->user;
        }
        return $this->subject(trans("email.email_verification"))->markdown('emails.verify-email')->with($data);
    }
}
