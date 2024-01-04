<?php

namespace App\Listeners;

use App\Events\NewCreatedUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class SendWelcomeMail
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
     * @param  \App\Events\NewCreatedUser  $event
     * @return void
     */
    public function handle(NewCreatedUser $event)
    { 
       //info($event->user->name);
       Mail::to("chippyjacob1990@gmail.com")
       ->send(new WelcomeMail($event->user));
    }
}
