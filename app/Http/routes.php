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
});


//Route::get('/', 'HomeController@index');
//Route::resource('/tasks', 'TasksController');
//Route::resource('activitybooks', 'ActivitybooksController');