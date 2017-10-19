<?php

namespace App\Http\Middleware;

use Closure;

class ApiToken
{
    protected $location;

    public function __construct()
    {
        $this->location = new \App\Location();
    }

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
        $location = $this->location;

//        return response()->json(['error' => $bearer_token])->setStatusCode(200);

        if ($bearer_token){
            $location = $location->where('api_key', '=', $bearer_token);
        }elseif ($url_token){
            $location = $location->where('api_key', '=', $url_token);
        }else{
            return response()->json(['error' => 'Token not found.'])->setStatusCode(200);
        }

        if (!$location->exists()){
            return response()->json(['error' => '.Token is not properly formatted or does not exists'])->setStatusCode(200);
        }

        return $next($request);
    }
}
