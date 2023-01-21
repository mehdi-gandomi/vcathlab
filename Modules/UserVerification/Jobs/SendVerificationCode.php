<?php

namespace Modules\UserVerification\Jobs;

use Modules\UserVerification\Mail\EmailVerification;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use phplusir\smsir\Smsir;

class SendVerificationCode
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var User
     */
    private $user;

    /**
     * @var $code
     */
    private $code;

    private $contact;

    private $reason;
    /**
     * Create a new job instance.
     *
     * @param User $user
     * @param $code
     */
    public function __construct($code,$contact,$reason="",$user=null)
    {
        $this->contact=$contact;
        $this->user = $user;
        $this->code = $code;
        $this->reason=$reason;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch ($this->queue) {
            case 'mobile':
                Smsir::sendVerification($this->code, $this->contact);
                break;
            case 'email':
                $data=[
                    $this->code
                ];
                if($this->user != null){
                    array_push($data,$this->user);
                }
                Mail::to($this->contact, $name = null)->send(new EmailVerification(...$data));
                break;
        }
    }
}
