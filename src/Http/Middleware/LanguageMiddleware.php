<?php

namespace TomatoPHP\FilamentLanguageSwitcher\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()) {
            if (! empty($request->user()->lang)) {
                app()->setLocale($request->user()->lang);
            } else {
                app()->setLocale('en');
            }
        }

        return $next($request);
    }
}
