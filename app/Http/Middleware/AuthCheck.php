<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        if(!session()->has('LoggedUser') && !$request->is('/')) {
            return redirect('/')->with('fail','Voce precisa estar logado!');
        }
        if(!session()->has('LoggedUser') && $request->is('/app')) {
            return redirect('/');
        }
        if(session()->has('LoggedUser') && $request->is('/')) {
            return redirect('/app');
        }

        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma', 'no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
