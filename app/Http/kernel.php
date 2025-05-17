<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

protected $routeMiddleware = [
    // ...
   'auth' => \App\Http\Middleware\Authenticate::class,
    'auth.admin' => \App\Http\Middleware\AuthAdmin::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
];
}