<?php

namespace App\Http\Middleware;

use Closure;

class IsRole
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
    	$user = $request->user();
    	if(!$user || !$user->hasRole($role)){
    		abort(403);
	    }
        return $next($request);
    }
}
