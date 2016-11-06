<?php

namespace CodeCommerce\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
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
        $user_admin = \Auth::user()->is_admin;

        if($user_admin != 1)
            return redirect('/');

        return $next($request);
    }
}
