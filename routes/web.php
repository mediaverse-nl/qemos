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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/orders', 'OrdersController@index')->name('order.index');

Route::get('/tafels', 'TafelsController@index')->name('tafel.index');
Route::get('/tafels/create', 'TafelsController@create')->name('tafel.create');
Route::get('/tafels/{id}/edit', 'TafelsController@edit')->name('tafel.edit');
Route::post('/tafels', 'TafelsController@store')->name('tafel.store');
Route::patch('/tafels/{id}', 'TafelsController@update')->name('tafel.update');

Route::get('/rooster', 'RoostersController@index')->name('rooster.index');

Route::get('/ingredient', 'IngredientsController@index')->name('ingredient.index');

Route::get('/products', 'ProductsController@index')->name('product.index');

Route::get('/keuken', 'KitchenController@index')->name('kitchen.index');

Route::get('/products', 'ProductsController@index')->name('product.index');
Route::get('/products/create', 'ProductsController@create')->name('product.create');
Route::post('/products', 'ProductsController@store')->name('product.store');
Route::patch('/products/{id}', 'ProductsController@update')->name('product.update');



//Route::get('/keuken', 'TafelsController@index')->name('product.index');




