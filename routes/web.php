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


$router->group(['middleware' => ['age']], function() use ($router) {
		$router->get('age/{age}', function ($age) {
    return 'age is :  '.$age;
		});
	});

$router->group(['middleware' => ['json']], function() use ($router) { // middleware json

	 $router->post('/testusers',['uses'=> 'UsersController@createUser']);
	 $router->post('/phones',['uses'=> 'PhonesController@createPhone']);
		
		$router->group(['middleware' => ['auth']], function() use ($router) {
	$router->get('/users', ['uses' => 'UsersController@index']);

	$router->group(['middleware' => ['age']], function() use ($router) {
		$router->post('/users',['uses'=> 'UsersController@createUser']);
	});
});

	});


$router->group(['middleware' => ['age']], function() use ($router) {
    
});

$router->post('/users/login',['uses' => 'UsersController@getToken' ]);

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function ()  {
    return str_random(32);
		});

$router->get('/errorage', function(){

	return "edad insuficiente para registrarse";
});


$router->get('/users/phone/{id}', ['uses' => 'UsersController@getPhone']);


