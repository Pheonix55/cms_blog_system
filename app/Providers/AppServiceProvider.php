<?php

namespace App\Providers;

use App\Events\UserRegistered;
use App\Listeners\SendWelcomeMessage;
use Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            UserRegistered::class,
            SendWelcomeMessage::class,
        );
    }
}
