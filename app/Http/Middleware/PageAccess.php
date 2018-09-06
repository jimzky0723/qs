<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class PageAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $page)
    {
        $access = Session::get('access');
        if($access->$page){
            return $next($request);
        }
        return redirect()->guest('page/denied');
    }
}
