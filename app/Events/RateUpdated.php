<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RateUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $rate;

    public function __construct($rate)
    {
        $this->rate = $rate;
    }

    public function broadcastOn()
    {
        return new Channel('rate-channel');
    }

    public function broadcastAs()
    {
        return 'rate-updated';
    }
}
