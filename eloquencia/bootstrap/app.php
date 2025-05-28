<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // Middleware route (auth, guest, etc.)
        $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,
            'auth:admin' => \App\Http\Middleware\Authenticate::class,
            'auth:member' => \App\Http\Middleware\Authenticate::class,
            'throttle.custom' => \App\Http\Middleware\ThrottleWithMessage::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
