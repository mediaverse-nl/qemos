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
});
//
$api->version('v1', ['middleware' => 'api.auth'], function ($api) {
    $api->get('orders', 'App\Http\Controllers\Api\OrderController@index');
    $api->get('order/{id}', 'App\Http\Controllers\Api\OrderController@show');

    $api->get('token', 'App\Http\Controllers\Auth\AuthController@token');
});

Route::prefix('v1')->name('api.')->namespace('Api')->group(function ()
//Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function()
{
    Route::resource('/product', 'ProductController');
    Route::resource('/order', 'OrderController');
    Route::resource('/location', 'LocationController');
    Route::resource('/user', 'UserController');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
