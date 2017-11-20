<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Closure;

Log::info('class SetLocale');

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = $request->input('lang');
        Log::info('SetLocale handling, lang='.$lang);
        if ($lang)
        {
            if ($lang == 'fr' or $lang == 'en')
            {
                Log::info('setting locale:'.$lang);
                App::setLocale($lang);
            }
        }

        return $next($request);
    }
}
