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
Route::get('/post/create', 'PostController@create')->name('create_post')->middleware('auth');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/post/{slug}', 'PostController@show')->name('post');
Route::get('/post/{id}/edit', 'PostController@edit')->name('edit_post');
Route::post('/post/update', 'PostController@update')->name('update_post');
Route::post('/post/{id}/delete', 'PostController@destroy')->name('delete_post');

Route::get('/profile', 'UserController@index')->name('profile');
Route::get('/author/{username}', 'UserController@show')->name('user_profile');
