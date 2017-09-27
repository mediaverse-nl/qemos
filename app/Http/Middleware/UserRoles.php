<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

//        $user = \auth()->user()->role;
        $user = ['admin1', 'admin4'];

        foreach ($roles as $role)
        {
            if (in_array($role, $user)){
                return $next($request);
            }

        }

        abort(403, 'Access denied');
    }
}
