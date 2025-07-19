<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php', // ✅ এই লাইনটা যোগ করো
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'student' => \App\Http\Middleware\StudentsMiddleware::class,
            'instructor' => \App\Http\Middleware\InstructorMiddleware::class,
            'check_role' => \App\Http\Middleware\InstructorIsActiveMiddleware::class,
           
        ]);

        // ---- global middleware register  settings 
        
         $middleware->prepend(\App\Http\Middleware\EmailConfigMiddleware::class);
       
        
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

   