<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UsersMiddleware
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
        if (Auth::check()){
            if (Auth::user()->role == 1 ){
                return redirect('/admin/index');
            }
            if (Auth::user() &&  Auth::user()->role != 1) {
                return $next($request);
            }
        }

        return redirect('/login');
    }
}
