<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'check.role1' => \App\Http\Middleware\CheckRole1::class,
            'check.role2' => \App\Http\Middleware\CheckRole2::class,
            'check.role3' => \App\Http\Middleware\CheckRole3::class,
            'check.role4' => \App\Http\Middleware\CheckRole4::class,
            'check.role12' => \App\Http\Middleware\CheckRole12::class,
            'check.role123' => \App\Http\Middleware\CheckRole123::class,
            'check.role124' => \App\Http\Middleware\CheckRole124::class,
            'check.role1234' => \App\Http\Middleware\CheckRole1234::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
