<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
// Middleware
use \App\Http\Middleware\PostMiddleware;
use \App\Http\Middleware\AdminMiddleware;

return Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    web: __DIR__ . '/../routes/web.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
  )
  ->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
      'PostMiddleware' => PostMiddleware::class, // middleware para verificar si el usuario es el dueño del post
      'AdminMiddleware' => AdminMiddleware::class, // middleware para verificar si el usuario tiene el rol de admin
    ]);
  })
  ->withExceptions(function (Exceptions $exceptions) {
    //
  })->create();
