<?php

namespace App\Listeners;

use App\Events\GameOver;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GameOverListener
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
     * @param  GameOver  $event
     * @return void
     */
    public function handle(GameOver $event)
    {
        //
    }
}
