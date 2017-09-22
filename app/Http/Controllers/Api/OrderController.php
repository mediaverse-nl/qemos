<?php

namespace App\Http\Controllers\Api;

use App\User;
use Dingo\Api\Routing\Helpers;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use JWTAuth;
use App\Transformers\UserTransformer;


class OrderController extends Controller
{
    // todo documentations - https://github.com/dingo/api/wiki/Responses
    use Helpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        try{
            $orders = User::all();

            return $this->response->collection($orders, new UserTransformer)->setStatusCode(200);

//        }catch (Exception $e){
//            return $e;
//        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        return \Tymon\JWTAuth\JWTAuth::parseToken()->toUser();

//        try{
            $order = User::findOrFail($id);

            return $this->response->item($order, new UserTransformer)->setStatusCode(200);

//        }catch (Exception $e)
//        {
//            return $e;
//        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
