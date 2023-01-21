<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class OnSendingEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageSending  $event
     * @return void
     */
    public function handle(MessageSending $event)
    {
        // $event->message->getHeaders()->addTextHeader('Reply-To', 'noreply@vcathlab.com \r\n');
        // $event->message->getHeaders()->addTextHeader('FROM', config("mail.from.address"));
        // $event->message->getHeaders()->addTextHeader('Date', date("Y-m-d"));
        // $event->message->getHeaders()->addTextHeader('MIME-Version', '1.0\r\n');
        // $event->message->getHeaders()->addTextHeader('Content-Type', 'text/html; charset=UTF-8\r\n');
        Log::info("sending email".json_encode($event->data));
    }
}
