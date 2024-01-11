<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::guard('admin')->check())
            return redirect()->route('admin.login.index')->with('error', 'Please login first.');

        return $next($request);
    }

    /*
    public function handle($request, Closure $next)
    {
        if (auth()->guard('admin')->check()) {
            return $next($request);
        }

        abort(403, 'Unauthorized access'); // or redirect to login page
    }
    */
}
