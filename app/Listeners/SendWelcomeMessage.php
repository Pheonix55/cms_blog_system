<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Jobs\SendWelcomeEmailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeMessage
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event)
    {
        SendWelcomeEmailJob::dispatch($event->user)->delay(now()->addSeconds(10));

    }
}
