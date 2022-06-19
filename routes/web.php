<?php

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all the routes for an application.
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
    $router->get('categorias[/{paginate}]', [
        'as' => 'categories',
        'uses' => 'Receptionists\CategoriesController@index'
    ]);
    $router->get('contas[/{paginate}]', [
        'as' => 'bills',
        'uses' => 'Receptionists\BillsController@index'
    ]);

    $router->group(['prefix' => 'categorias'], function () use ($router) {

        $router->post('cadastrar', [
            'as' => 'category.create',
            'uses' => 'Receptionists\CategoriesController@store'
        ]);
        $router->get('visualizar/{id}', [
            'as' => 'category.read',
            'uses' => 'Receptionists\CategoriesController@show'
        ]);
        $router->put('editar/{id}', [
            'as' => 'category.update',
            'uses' => 'Receptionists\CategoriesController@update'
        ]);
        $router->delete('excluir/{id}', [
            'as' => 'category.delete',
            'uses' => 'Receptionists\CategoriesController@destroy'
        ]);

        $router->get('restaurar/{id}', [
            'as' => 'category.restore',
            'uses' => 'Receptionists\CategoriesController@restore'
        ]);
    });

    $router->group(['prefix' => 'contas'], function () use ($router) {
        $router->post('cadastrar', [
            'as' => 'bill.create',
            'uses' => 'Receptionists\BillsController@store'
        ]);
        $router->get('visualizar/{id}', [
            'as' => 'bill.read',
            'uses' => 'Receptionists\BillsController@show'
        ]);
        $router->put('editar/{id}', [
            'as' => 'bill.update',
            'uses' => 'Receptionists\BillsController@update'
        ]);
    });
});
