<?php

namespace App\Http\Middleware;

use Closure;

class EHRMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && !$request->user()->subscribed('ehr') && !$request->user()->role == 2)
            return redirect('/profile');
        return $next($request);
    }
}
