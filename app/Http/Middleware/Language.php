<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // dd(session('applocale'),config('languages'));

        if(session('applocale')){
            $configLanguage = config('langueges')[session('applocale')];
            setlocale(LC_TIME, $configLanguage[1] . '.utf8');
            Carbon::setLocale(session('applocale'));
            App::setLocale(session('applocale'));
        }else{
            session()->put('applocale', config('app.fallback_locale'));
            setlocale(LC_TIME, 'es_ES.utf8');
            Carbon::setLocale(session('applocale'));
            App::setLocale(session('applocale'));
        }

        // dd($next($request));
        return $next($request);
        // return $next($request);
    }
}
