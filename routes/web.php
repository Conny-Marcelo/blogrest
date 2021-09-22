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

$router->get('/login/{user}/{pass}', 'AuthController@login');

$router->group(['middleware'=>['auth']], function() use($router){
    $router->get('/usuario', 'UserController@index');
    $router->get('/usuario/{user}', 'UserController@get');
    $router->post('/usuario', 'UserController@create');
    $router->put('/usuario/{user}', 'UserController@update');
    $router->delete('/usuario/{user}', 'UserController@destroy');

    //rutas para topics
    $router->get('/topics', 'TopicController@index');
    $router->get('/topics/{id}', 'TopicController@get');
    $router->post('/topics', 'TopicController@create');
    $router->put('/topics/{id}', 'TopicController@update');
    $router->delete('/topics/{id}', 'TopicController@destroy');

        //rutas para post
        $router->get('/posts', 'PostController@index');
        $router->get('/posts/{id}', 'PostController@get');
        $router->post('/posts', 'PostController@create');
        $router->put('/posts/{id}', 'PostController@update');
        $router->delete('/posts/{id}', 'PostController@destroy');

}
);