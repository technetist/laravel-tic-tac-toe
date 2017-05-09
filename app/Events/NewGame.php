<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewGame implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $destinationUserId;
    public $gameId;
    public $from;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($destinationUserId, $gameId, $from)
    {
        $this->destinationUserId = $destinationUserId;
        $this->gameId = $gameId;
        $this->from = $from;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('new-game-channel');
    }
}
