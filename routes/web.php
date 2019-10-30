<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
    return redirect('api/swagger-demo');
});

$router->group(['', ''], function () use ($router) {
	$router->group(['prefix' => 'condominiums/'], function ($router) {
		/**
		 * Condominius routes
		 */
		Route::get('/', 'CondominiumsController@index');
		Route::post('/', 'CondominiumsController@store');
		/**
		 * User routes
		 */
		Route::post('authenticate/', 'AuthenticateController@authenticate');
		Route::get('users/', 'UsersController@index');
		Route::get('users/{documents}', 'UsersController@show');
		Route::post('users/', 'UsersController@store');
		Route::put('users/{documents}', 'UsersController@update');
		Route::delete('users/{documents}', 'UsersController@destroy');
		Route::patch('users/{documents}', 'UsersController@restore');
	});
});