<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserCheck
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
        if(Session::get('loggedIn')) {
            if(Session::get('id')==$request->route('id')) {
                return $next($request);
            } else {
                return redirect()->back();
            } 
        }
        return redirect()->route('signin');
        
    }
}
