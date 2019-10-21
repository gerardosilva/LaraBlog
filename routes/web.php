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

Auth::routes();

Route::redirect('/', '/posts');
Route::get('/posts', 'HomeController@index')->name('home');

Route::get('/posts/{page}', 'HomeController@page');
Route::get('/post/{id}', 'PostsController@show');