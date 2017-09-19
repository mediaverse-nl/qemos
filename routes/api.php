<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/order', 'Api\OrderController@index')->name('api.order.index');

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('test', function(){
        return response()->json(['code'=>20000, 'token'=>'fsdf234']);
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
