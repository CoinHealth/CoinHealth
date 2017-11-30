<?php

namespace App\Http\Middleware;

use Closure;

class PatientMiddleware
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
        $user = request()->user();
        if (!$user)
            return redirect('/profile');
        
        if ($user &&
                ($user->subscribed('crm') || $user->subscribed('ehr')) ||
                $user->role != 1)
        {
            return redirect('/profile');
        }
        return $next($request);
    }
}
