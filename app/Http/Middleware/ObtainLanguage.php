<?php

namespace App\Http\Middleware;

use Closure;

use App\Geolocation;

class ObtainLanguage
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
        $language = new Geolocation();
        \App::setLocale($language->language);

        return $next($request);
    }
}
