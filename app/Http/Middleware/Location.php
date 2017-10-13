<?php

namespace App\Http\Middleware;

use Closure;

class Location
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
        $user = auth()->user();

        if (!$request->session()->exists('location')){
            // Specifying a default value if not set
            session()->put('location', key($user->locations()->all()));
        }

        return $next($request);
    }
}
