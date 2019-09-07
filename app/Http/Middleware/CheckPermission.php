<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckPermission
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
        if (Auth::user()->permission == 'None' || Auth::user()->permission == 'Deleted') {
            Auth::logout();

            $request->session()->invalidate();
            return redirect ('/nopermit');
        }
        return $next($request);
    }
}
