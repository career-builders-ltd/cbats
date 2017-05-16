<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)    {
        $redirectTo = "/";
        if(Session::get('AID')=='' && Session::get('ISA')!=1){
            return redirect($redirectTo);
        }
        return $next($request);
    }
}
