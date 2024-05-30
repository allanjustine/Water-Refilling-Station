<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
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
        // $hour = now()->hour;

        // if ($hour >= 18 && $hour < 8) {
        //     return $next($request);
        // }

        // $now = Carbon::now('UTC');

        // $closingStart = Carbon::parse('18:00:00', 'UTC');
        // $closingEnd = Carbon::parse('8:00:00', 'UTC')->addDay();

        // if ($now->between($closingStart, $closingEnd, true)) {
        //     return $next($request);
        // }

        $timezone = 'Asia/Manila';

        $now = Carbon::now($timezone);

        $open = 8;
        $close = 18;

        if ($now->hour >= $open && $now->hour < $close) {
            return $next($request);
        }

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
