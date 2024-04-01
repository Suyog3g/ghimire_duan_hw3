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

$router->get('/pokemons', 'PokemonController@getAll');
$router->get('/pokemons/{id}', 'PokemonController@getOne');
$router->post('/pokemons/add', 'PokemonController@save');
$router->post('/pokemons/edit/{id}', 'PokemonController@update');
$router->delete('/pokemons/delete/{id}', 'PokemonController@delete');