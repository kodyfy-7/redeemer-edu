<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role->role_slug == 'admin')
        {
            return $next($request);
        }

        return redirect('/home')->with('error', 'Unauthorized access');
    }
}