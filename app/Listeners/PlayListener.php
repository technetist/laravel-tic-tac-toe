<?php

namespace App\Listeners;

use App\Events\Play;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PlayListener
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
     * @param  Play  $event
     * @return void
     */
    public function handle(Play $event)
    {
        //
    }
}
