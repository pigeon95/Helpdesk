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


Route::get('/', 'PagesController@getIndex');
Route::resource('tasks', 'TaskController');

Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::get('auth/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('auth/register', 'Auth\RegisterController@register');

Route::post('comments/{task_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);