<?php


namespace LaravelConsent\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;


class LaravelConsent
{
    public function handle($request, Closure $next)
    {
        dump(Route::currentRouteName());
        return $next($request);
    }
}