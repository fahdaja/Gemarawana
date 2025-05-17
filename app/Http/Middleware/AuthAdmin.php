<?php

// app/Http/Middleware/AuthAdmin.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    public function handle($request, Closure $next)
    {
            if (!session('logged_in') || session('username') !== 'fahdganteng') {
            return redirect()->route('login.form')->withErrors(['Akses ditolak. Silakan login terlebih dahulu.']);
        }
        return $next($request); 
    }
}




