<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class LoginAccess
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
        $user = Session::get('auth');
        if($user){
            return redirect()->guest('/');
        }
        return $next($request);
    }
}
