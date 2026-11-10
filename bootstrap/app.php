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
    ->withMiddleware(function (Middleware $middleware): void {

        /** 
             * Add your middleware configuration here statefulApi() is a method that configures the application to handle stateful API requests,
             *  which are typically used for APIs that require session management and authentication. 
             * This is important for applications that need to maintain user state across multiple requests, 
             * such as when using cookies or session tokens for authentication.
             * By calling $middleware->statefulApi(), the application is set up to properly handle these stateful interactions,
             * ensuring that user sessions are managed correctly and securely.
         */
        $middleware->statefulApi();
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
