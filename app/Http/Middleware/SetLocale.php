<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Closure;

class SetLocale
{
    /**
     * Adjusts application locale based on user input.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // lang change detected in current request ?
        $lang = $request->input('lang');
        if ($lang)
        {
            if ($lang == 'fr' or $lang == 'en')
            {
                // record new lang in user session
                Session::put('lang', $lang);
            }

        }

        // has lang been defined ?
        $lang = Session::get('lang');
        if ($lang)
        {
            app()->setLocale($lang);
        }

        // systematically share lang with view
        View::share(['lang' => app()->getLocale()]);

        return $next($request);
    }
}
