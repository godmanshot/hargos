<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class Locale
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
        if(Cookie::has('lang')) {
            App::setLocale(Cookie::get('lang'), 'ru');
        }
        if($request->headers->has('X-localization')) {
            $lang = $request->header('X-localization');
            App::setLocale($lang);
        }
        
        return $next($request);
    }
}
