<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\NewGame' => [
            'App\Listeners\NewGameListener',
        ],
        'App\Events\Play' => [
            'App\Listeners\PlayListener',
        ],
        'App\Events\GameOver' => [
            'App\Listeners\GameOverListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
