<?php

namespace App\Http\Middleware;

use Auth;
use Config;
use Session;
use Closure;

class AdminAuth
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
        if(Auth::check())
        {
            if(Auth::user()->role == Config::get('constants.user_role.super_admin') || Auth::user()->role == Config::get('constants.user_role.admin'))
            {
                return $next($request);
            }

            Auth::logout();

            Session::flash('message', 'Unauthorized request');
            Session::flash('alert-class', 'danger');
        }

        return redirect()->route('admin_login');
    }
}
