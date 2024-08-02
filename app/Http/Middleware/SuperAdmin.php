<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // if (Auth::user()->role == 1) {
        //     return redirect()->route('superadmin');
        // }

        // if (Auth::user()->role == 5) {
        //     return redirect()->route('academy');
        // }

        // if (Auth::user()->role == 6) {
        //     return redirect()->route('scout');
        // }

        // if (Auth::user()->role == 4) {
        //     return redirect()->route('team');
        // }

        // if (Auth::user()->role == 3) {
        //     return $next($request);
        // }

        // if (Auth::user()->role == 2) {
        //     return redirect()->route('admin');
        // }
    }
}
