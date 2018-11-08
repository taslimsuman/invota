<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->status==1 && (Auth::user()->role_id==2 || Auth::user()->role_id==1)) {

            return $next($request);
            
        } else{

            return redirect('/error')->with('status','Your are not authorized');
        }
    }
}
