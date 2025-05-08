<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        // then: function () {
        //     Route::middleware(['web', 'auth', 'is_admin'])
        //         ->prefix('admin')
        //         ->name('admin.')
        //         ->group(base_path('routes/admin.php'));
        // },
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->append(IsAdmin::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
