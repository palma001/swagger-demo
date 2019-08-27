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
		Route::post('authenticate/', 'AuthenticateController@authenticate');
		Route::get('users/', 'UsersController@index');
		Route::post('users/', 'UsersController@store');
		Route::put('users/{documents}', 'UsersController@update');
	});
});