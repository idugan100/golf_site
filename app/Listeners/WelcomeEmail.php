<?php

namespace App\Listeners;

use App\Events\Newuser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WelcomeEmail
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
     * @param  \App\Events\Newuser  $event
     * @return void
     */
    public function handle(Newuser $event)
    {
        dd($event->user);
    }
}
