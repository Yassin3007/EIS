<?php

namespace App\Http\Middleware;

use Closure;

class LangMiddleware
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
        $lang = app()->getLocale();
        if($request->header('language'))
        {
            $lang = 'en';
            if($request->header('language')=='ar'){
                $lang= 'ar';
            }
//            $lang = $request->header('language');
        }
        else
        {
            if (session()->has('lang'))
            {
                $lang = session()->get('lang');
            }else
            {
                $lang = 'ar';
            }
        }
        app()->setLocale($lang);
        session()->put('lang',$lang);
        return $next($request);
    }
}
