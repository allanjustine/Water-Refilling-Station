<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimeBasedRoutingMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {

        // $timezone = 'Asia/Manila';

        // $now = Carbon::now($timezone);

        // $open = 8;
        // $close = 18;

        // if ($now->hour >= $open && $now->hour < $close) {
           return $next($request);
        // }

        // if ($request->is('closed')) {
        //    return $next($request);
        // }
        // return redirect('/closed');
    }
}
