<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return $router->app->version();
});

$router->group([], function () use ($router) {
    // Matches "/api/register
   $router->post('new_account', 'AuthController@register');
     // Matches "/api/login
    $router->post('login', 'AuthController@login');

    // Matches "/api/profile
    $router->get('user', 'UserController@profile');

    $router->put('user', 'UserController@update');

    $router->delete('user', 'UserController@delete');

    // Matches "/api/users/1
    //get one user by id
    // $router->get('users/{id}', 'UserController@singleUser');
    //
    // // Matches "/api/users
    // $router->get('users', 'UserController@allUsers');
});
