<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

         try{
             if (! $token = JWTAuth::attempt($credentials)) {
                 return response()->json(['error' => 'invalid_credentials'], 401);
             }

         } catch (JWTException $e){
             return response()->json(['error' => 'could_not_create_token'], 500);
         }

         return response()->json(compact('token'));
    }
}
