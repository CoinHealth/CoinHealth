<?php

namespace App\Http\Middleware;

use Closure;

class CRMSubscriber
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
        if ($request->user() &&
            !$request->user()->subscribed('crm') ||
            $request->user()->subscription('crm')->cancelled()) 
        {
            return redirect('/profile');
        }

        return $next($request);
    }
}
