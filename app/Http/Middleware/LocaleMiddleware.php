<?php namespace App\Http\Middleware;

use Closure;

class LocaleMiddleware {


	protected $languages = [
		'en',
		'es',
	];
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// if(!Session::has('locale'))
		// {
		// 	Session::put('locale', $request->getPreferredLanguage($this->languages));
		// }
		//
		// app()->setLocale(Session::get('locale'));

		return $next($request);
	}

}
