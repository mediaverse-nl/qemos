<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth.role:developer'])->prefix('developer')->name('developer.')->namespace('Developer')->group(function () {
    Route::get('/', function () {
        return 'developer';
    })->name('index');
    Route::resource('/kiosk', 'KioskController');
    Route::resource('/location', 'LocationController');
    Route::resource('/Pin', 'PinController');
});

//super admin
Route::middleware(['auth.role:admin,admin1'])->prefix('admin-test')->name('admin-test.')->namespace('Admin')->group(function () {
    Route::get('/', function () {
        return view('auth.admin.index');
    })->name('index');
});

//manager admin
Route::middleware(['web'])->prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    Route::get('/', function () {
        return view('auth.admin.index');
    })->name('index');
    Route::resource('/menu', 'MenuController');
    Route::resource('/product', 'ProductController');
    Route::resource('/ingredient', 'IngredientController');
    Route::resource('/tafel', 'TafelController');
//    Route::resource('/order', 'OrderController');
//    Route::resource('/user', 'UserController');
//    Route::resource('/kiosk', 'KioskController');

});

//kiosk api migration

//make database compleet
//organization size wise + communication with our own api

//kiosk panel
Route::middleware(['web', 'kiosk.token'])->prefix('kiosk')->name('kiosk.')->namespace('Kiosk')->group(function () {
    Route::get('/', function () {
        return view('kiosk.index');
    })->name('index');
    Route::resource('/booking', 'BookingController');
    Route::resource('/order', 'OrderController');
});

//klant panel
Route::middleware(['web'])->prefix('klant')->name('klant.')->namespace('Klant')->group(function () {
    Route::get('/', function () {
        return view('kiosk.index');
    })->name('index');
    Route::resource('/order', 'OrderController');
});



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/tafel', 'OrdersController@index')->name('order.index');
Route::get('/orders/{id}', 'OrdersController@show')->name('order.show');

//Route::get('/tafels', 'TafelController@index')->name('tafel.index');
//Route::get('/tafels/create', 'TafelController@create')->name('tafel.create');
//Route::get('/tafels/{id}/edit', 'TafelController@edit')->name('tafel.edit');
//Route::post('/tafels', 'TafelController@store')->name('tafel.store');
//Route::patch('/tafels/{id}', 'TafelController@update')->name('tafel.update');

//Route::get('/rooster', 'RoostersController@index')->name('rooster.index');
//
//Route::get('/ingredient', 'IngredientController@index')->name('ingredient.index');

//Route::get('/products', 'ProductController@index')->name('product.index');

//Route::get('/keuken', 'KitchenController@index')->name('kitchen.index');

//Route::group(['prefix' => 'settings'], function () {
//
//    Route::get('/menu/{id}', 'MenuController@show')->name('menu.show');
//    Route::get('/menu', 'MenuController@index')->name('menu.index');
//    Route::post('/menu', 'MenuController@store')->name('menu.store');
//    Route::put('/menu/{id?}', 'MenuController@update')->name('menu.update');
//    Route::delete('/menu/{id?}', 'MenuController@destroy')->name('menu.destroy');
//
//    Route::get('/ingredients/{id}', 'IngredientController@show')->name('ingredient.show');
//    Route::get('/ingredients', 'IngredientController@index')->name('ingredient.index');
//    Route::post('/ingredients', 'IngredientController@store')->name('ingredient.store');
//    Route::put('/ingredients/{id?}', 'IngredientController@update')->name('ingredient.update');
//    Route::delete('/ingredients/{id?}', 'IngredientController@destroy')->name('ingredient.destroy');
//
//    Route::get('/tafel/{id}', 'TafelController@show')->name('tafel.show');
//    Route::get('/tafel', 'TafelController@index')->name('tafel.index');
//    Route::post('/tafel', 'TafelController@store')->name('tafel.store');
//    Route::put('/tafel/{id?}', 'TafelController@update')->name('tafel.update');
//    Route::delete('/tafel/{id?}', 'TafelController@destroy')->name('tafel.destroy');
//
//    Route::get('/products/{id}', 'ProductController@show')->name('product.show');
//    Route::get('/products', 'ProductController@index')->name('product.index');
//    Route::post('/products', 'ProductController@store')->name('product.store');
//    Route::put('/products/{id?}', 'ProductController@update')->name('product.update');
//    Route::delete('/products/{id?}', 'ProductController@destroy')->name('product.destroy');
//
//});

Route::group(['prefix' => 'order'], function ()
{
    Route::get('/{id}', ['as' => 'cart.index', 'uses' => 'OrdersController@get']);
    Route::post('/add', ['as' => 'cart.add', 'uses' => 'OrdersController@add']);
    Route::post('/save', ['as' => 'cart.save', 'uses' => 'OrdersController@save']);
    Route::get('/product/{id}', ['as' => 'cart.ingredients', 'uses' => 'OrdersController@ingredients']);
    Route::post('/excluded', ['as' => 'cart.excluded', 'uses' => 'OrdersController@excluded']);
    Route::get('/get/ingredients', ['as' => 'ingredients', 'uses' => 'IngredientController@ingredients']);
    Route::delete('/delete/{id?}', 'OrdersController@destroy')->name('product.destroy');



//    Route::get('/checkout', ['as' => 'cart.checkout', 'uses' => 'CartController@create']);
//    Route::post('/verwijder', ['as' => 'cart.remove', 'uses' => 'CartController@remove']);
//    Route::post('/plus', ['as' => 'cart.increase', 'uses' => 'CartController@increase']);
//    Route::post('/min', ['as' => 'cart.decrease', 'uses' => 'CartController@decrease']);
//    Route::post('/legen', ['as' => 'cart.empty', 'uses' => 'CartController@destroy']);
});

//https://tutorials.kode-blog.com/laravel-5-ajax-tutorial
//Route::get('/products/{id?}',function($task_id){
//    $task = Task::find($task_id);
//    return response()->json($task);
//});

Route::get('/products/{id?}',function($task_id){
    $task = \App\Product::find($task_id);

    return Response::json($task);
})->name('product.json');




//Route::get('/keuken', 'TafelController@index')->name('product.index');



//use App\Events\OrderPosted;

//Route::get('/socket-test',function(){
//    return view('socket-text');
//});

//Route::get('/socket-test', function() {
//    // this doesn't do anything other than to
//    // tell you to go to /fire
//    return "go to /fire";
//});
//
//Route::get('socket-test/fire', function () {
//    $user = \App\User::findOrFail(1);
//    // this fires the event
//    event(new App\Events\OrderPosted());
//    return "event fired";
//});
//
//Route::get('socket-test/test', function () {
//    // this checks for the event
//    return view('socket-text');
//});

//Route::post('/new-orders',function(){
//
//    $user = auth()->user();
//
//    event(new OrderPosted($user));
//
//    return ['status' => 'OK'];
//
//});

