<?php

namespace App\Http\Middleware;

use Closure;

class AjaxOnly
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
        if ($request->user() && $request->ajax())
            return $next($request);
        return response('Unauthorized.', 401);
    }
}
