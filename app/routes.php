<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('login', ['as' => 'login', 'uses' => 'UsersController@login']);

Route::post('/login', ['as' => 'login', 'uses' => 'UsersController@handleLogin']); 

Route::get('profile', ['before' => 'auth', 'as' => 'profile', 'uses' => 'UsersController@profile']);

Route::get('logout', ['before' => 'auth', 'as' => 'logout', 'uses' => 'UsersController@logout']);

Route::get('upload', ['before' => 'auth', 'as' => 'upload', 'uses' => 'FilesController@upload']);

Route::post('/upload', ['as' => 'upload', 'uses' => 'FilesController@handleUpload']);

Route::get('log', ['before' => 'auth', 'as' => 'log', 'uses' => 'FilesController@log']);

Route::resource('user', 'UsersController');
