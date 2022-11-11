<?php

namespace App\Listeners;

use App\Events\Newuser;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        
        Mail::to($event->user)->send(new Welcome($event->user));
    }
}
