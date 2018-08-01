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

// O "->name" FOI PASSADO PARA SIMPLIFICAR NA CHAMADA NOS CONTROLLERS
Route::get('/product', 'ProductController@list')->name('product.list');
Route::get('/product/detail/{id}', 'ProductController@show')->where('id', '[0-9]+');
Route::get('/product/new', 'ProductController@new');
Route::post('/product/add', 'ProductController@add');
Route::get('/product/json', 'ProductController@json');
Route::get('/product/remove/{id}', 'ProductController@remove')->where('id', '[0-9]+');

