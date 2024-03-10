<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LanguageMiddleware
{
    // There are two cookies for language:
    // 1. applocale: for guests
    // 2. lang_pref_user_{id}: for logged in users


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Default to English
        $locale = 'en';

        // Check for user-specific cookie if user is logged in
        if (Auth::check()) {
            $cookieName = 'lang_pref_user_' . Auth::user()->id;
            $locale = Cookie::get($cookieName, $locale);
        } else {
            // For guests, check the generic applocale cookie
            $locale = Cookie::get('applocale', $locale);
        }

        if (array_key_exists($locale, config('app.locales'))) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
