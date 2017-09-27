<?php

namespace App\Http\Middleware;

use Closure;

class ApiToken
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
        $url = $request->header('authorization');

        $token = '8b9257a19898f585a806f3759e0aa620';

        if ($url){
            if ($url == 'Bearer '.$token){
                return $next($request);
            }
            return response()->json(['Token is not properly formatted or does not exists.'])->setStatusCode(200);
        }else{
            return response()->json(['Token not found.'])->setStatusCode(200);
        }

//dd($url);
    }
}
