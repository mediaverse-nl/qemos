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

//Route::get('/order', 'Api\OrderController@index')->name('api.order.index');

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->post('login', 'App\Http\Controllers\Auth\AuthController@authenticate');
    $api->get('orders', 'App\Http\Controllers\Api\OrderController@index');

});

$api->version('v1', ['middleware' => 'api.auth'], function ($api) {
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
