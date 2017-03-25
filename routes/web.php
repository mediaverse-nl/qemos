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

//use Input;
//use Validator;
use App\Product;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/tafel', 'OrdersController@index')->name('order.index');
Route::get('/orders/{id}', 'OrdersController@show')->name('order.show');

Route::get('/tafels', 'TafelsController@index')->name('tafel.index');
Route::get('/tafels/create', 'TafelsController@create')->name('tafel.create');
Route::get('/tafels/{id}/edit', 'TafelsController@edit')->name('tafel.edit');
Route::post('/tafels', 'TafelsController@store')->name('tafel.store');
Route::patch('/tafels/{id}', 'TafelsController@update')->name('tafel.update');

Route::get('/rooster', 'RoostersController@index')->name('rooster.index');

Route::get('/ingredient', 'IngredientsController@index')->name('ingredient.index');

//Route::get('/products', 'ProductsController@index')->name('product.index');

Route::get('/keuken', 'KitchenController@index')->name('kitchen.index');

Route::group(['prefix' => 'settings'], function () {

    Route::get('/ingredients/{id}', 'IngredientsController@show')->name('ingredient.show');
    Route::get('/ingredients', 'IngredientsController@index')->name('ingredient.index');
    Route::post('/ingredients', 'IngredientsController@store')->name('ingredient.store');
    Route::put('/ingredients/{id?}', 'IngredientsController@update')->name('ingredient.update');
    Route::delete('/ingredients/{id?}', 'IngredientsController@destroy')->name('ingredient.destroy');

    Route::get('/products/{id}', 'ProductsController@show')->name('product.show');
    Route::get('/products', 'ProductsController@index')->name('product.index');
    Route::post('/products', 'ProductsController@store')->name('product.store');
    Route::put('/products/{id?}', 'ProductsController@update')->name('product.update');
    Route::delete('/products/{id?}', 'ProductsController@destroy')->name('product.destroy');

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


//Route::get('/keuken', 'TafelsController@index')->name('product.index');




