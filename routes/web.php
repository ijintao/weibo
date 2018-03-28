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

Route::get('/', 'WeiboController@index');
Route::post('/weibo/create', 'WeiboController@create');
Route::get('/user', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::get('/user/getdetail', 'UserController@getDetail');
Route::get('/register', 'UserController@register');
Route::post('/register', 'UserController@register');
Route::get('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');
Route::post('/login', 'UserController@login');
Route::get('/follow/{uid}', 'UserController@follow');
