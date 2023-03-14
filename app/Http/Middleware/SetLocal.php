<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocal
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
        if(!is_null(auth()->user()))
            $lang = auth()->user()->lang;   
        elseif ($request->lang)
            $lang = $request->lang;   
        else
            $lang = 'ar';
        
        
            app()->setLocale($lang);
            
        return $next($request);
    }
}
