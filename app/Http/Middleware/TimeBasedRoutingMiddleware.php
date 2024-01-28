<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimeBasedRoutingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $hour = now()->hour;

        if ($hour >= 18 || $hour < 8) {
            return $next($request);
        }

        if ($request->is('closed')) {
            return $next($request);
        }
        return redirect('/closed');
    }
}
