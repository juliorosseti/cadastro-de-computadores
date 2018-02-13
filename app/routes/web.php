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
    return $router->app->version();
});

$router->post('/api/computer', 'ComputerController@add');
$router->get('/api/computer/{id}', 'ComputerController@view');
$router->delete('/api/computer/{id}', 'ComputerController@delete');
$router->get('/api/computers', 'ComputerController@list');
$router->put('/api/computer/{id}', 'ComputerController@edit');

