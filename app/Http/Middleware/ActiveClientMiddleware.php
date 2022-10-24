<?php

namespace App\Http\Middleware;

use App\Events\ActiveClientEvent;
use Closure;
use Illuminate\Http\Request;
use Rainwater\Active\Active;

class ActiveClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        ActiveClientEvent::dispatch(Active::guests(1)->count());
        return $next($request);
    }
}
