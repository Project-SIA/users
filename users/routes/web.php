<?php


$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/users',['uses' => 'UserController@index']);
$router->post('/users', 'UserController@add'); // create new user record
$router->get('/users/{user_id}', 'UserController@show'); // get user by id
$router->put('/users/{user_id}', 'UserController@update'); // update user record
$router->delete('/users/{user_id}', 'UserController@delete'); // delete record