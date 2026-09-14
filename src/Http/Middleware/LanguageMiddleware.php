<?php

namespace TomatoPHP\FilamentLanguageSwitcher\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): Response  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user) {
            app()->setLocale(! empty($user->lang) ? $user->lang : config('app.locale', 'en'));
        }

        return $next($request);
    }
}
