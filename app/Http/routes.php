<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$api = app(Dingo\Api\Routing\Router::class);

$api->version('v1', function ($api) {
	$api->get('/', 'App\Http\Controllers\HomeController@index');
	$api->resource('tasks', 'App\Http\Controllers\TasksController');
	$api->resource('activitybooks', 'App\Http\Controllers\ActivitybookController');
	$api->resource('activities', 'App\Http\Controllers\ActivityController');
	$api->resource('tasklists', 'App\Http\Controllers\TasklistController');
	$api->resource('users', 'App\Http\Controllers\UserController');
	$api->resource('authenticate', 'App\Http\Controllers\AuthenticateController');
	$api->get('usercredentials', 'App\Http\Controllers\AuthenticateController@getAuthenticatedUser');
});


//Route::get('/', 'HomeController@index');
//Route::resource('test', 'TasksController');
//Route::resource('activitybooks', 'ActivitybooksController');
