<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminMiddleware
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
        if((Auth::user()) && (Auth::user()->adnin == 'admin'))
        {
            return $next($request);
        }else{
        return redirect()->route('home')->with('admin','you are not allowed to admin panel');

            
        }
       
    }
}
