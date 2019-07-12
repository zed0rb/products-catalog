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

Route::get('/', 'LandingPageController@index');
Route::get('/single-product/{product}', 'LandingPageController@show');


Route::resource('products', 'ProductsController');

Route::delete('/deleteall', 'ProductsController@deleteAll');

