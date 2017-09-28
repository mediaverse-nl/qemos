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
        $bearer_token = $request->header('authorization');
        $url_token = $request->token;

//        dd($url1);
        $token = '8b9257a19898f585a806f3759e0aa620';

        if ($bearer_token || $url_token){
            if ($bearer_token == 'Bearer '.$token || $url_token){
                return $next($request);
            }
            return response()->json(['Token is not properly formatted or does not exists.'])->setStatusCode(200);
        }else{
            return response()->json(['Token not found.'])->setStatusCode(200);
        }

//dd($url);
    }
}
