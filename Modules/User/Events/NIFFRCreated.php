<?php
namespace Modules\User\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\User\Models\NIFFRCase;

class NIFFRCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $nIFFRCase;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $nIFFRCase)
    {
        $this->nIFFRCase=$nIFFRCase;
    }

        /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('channel-name');
    }
}
