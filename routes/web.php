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

Route::get('/', ['as' => 'index', 'uses' => 'PrincipalController@index']);
Route::get('/search', ['as' => 'index', 'uses' => 'PrincipalController@search']);
Route::get('/product/{productId}', ['as' => 'index', 'uses' => 'PrincipalController@product']);
