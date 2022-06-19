<?php

/** @var Router $router */

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

use Laravel\Lumen\Routing\Router;

$router->post('auth/login', [
    'as' => 'auth.login',
    'uses' => 'Auth\AccessController@login'
]);

/**
 * Rotas protegidas com um middleware que verifica o usuário pelo TOKEN passado no cabeçalho
 * da requisição
 **/
$router->group(['middleware' => 'auth'], function () use ($router) {

    $router->get('/', function () use ($router) {
        return $router->app->version();
    });
    $router->get('auth/logout', [
        'as' => 'auth.logout',
        'uses' => 'Auth\AccessController@logout'
    ]);

    $router->group(['prefix' => 'categorias'], function () use ($router) {

        $router->get('/', [
            'as' => 'category',
            'uses' => 'Receptionists\CategoriesController@index'
        ]);
        $router->post('cadastrar', [
            'as' => 'category.create',
            'uses' => 'Receptionists\CategoriesController@store'
        ]);
        $router->put('editar/{id}', [
            'as' => 'category.update',
            'uses' => 'Receptionists\CategoriesController@update'
        ]);
    });
});
