<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class GameOver implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $result;
    public $gameId;
    public $userId;
    public $type;
    public $location;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($gameId, $userId, $result, $location, $type)
    {
        $this->gameId = $gameId;
        $this->userId = $userId;
        $this->result = $result;
        $this->location = $location;
        $this->type = $type;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('game-over-channel-' . $this->gameId . '-' . $this->userId);
    }
}
