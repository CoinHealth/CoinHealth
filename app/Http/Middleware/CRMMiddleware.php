<?php

namespace App\Http\Middleware;

use Closure;

class CRMMiddleware
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
        if ($request->user() && !$request->user()->subscribed('crm') && !$request->user()->role == 3)
            return redirect('/profile');
        return $next($request);
    }
}
