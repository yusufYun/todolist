<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (isset(Auth::user()->id))
        {
            if (Auth::user()->role->name == 'admin')
                return $next($request);
        }
        return redirect('/');
    }
}
