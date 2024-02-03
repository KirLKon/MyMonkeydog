<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DetectLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        if (in_array($locale,config('app.available_locales'))) {
            app()->setLocale($locale);
        } else {
            app()->setLocale(config('app.locale'));
        }
        return $next($request);
    }
}
