<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GuestSession
{
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('user_logged_in')) {
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
