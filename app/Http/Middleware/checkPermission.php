<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class checkPermission
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
        if(Session::has('username')){
            // Session::put("req",$request);
            return $next($request);
        }
        // return $next($request);
        return redirect('login');
    }
}
