<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{

    public function handle($request, Closure $next)
    {

        if(!Auth::check() || Auth::user()->role != 1){

            return redirect(url('/login'));

        }

        return $next($request);
    }
}
