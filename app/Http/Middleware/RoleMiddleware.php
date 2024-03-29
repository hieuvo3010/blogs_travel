<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!Auth()->user()){
            abort(404);
        }
        if(Auth()->user()->role->name != $role){
            abort(404);
        }
        return $next($request);
    }
}
