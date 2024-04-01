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

$router->get('/pokemon', 'PokemonController@getAll');
$router->get('/pokemon/{id}', 'PokemonController@getOne');
$router->post('/pokemon/add', 'PokemonController@save');
$router->put('/pokemon/edit/{id}', 'PokemonController@update');
$router->delete('/pokemon/delete/{id}', 'PokemonController@delete');
