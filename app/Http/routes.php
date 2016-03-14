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

/*$app->get('/', function () use ($app) {
    return $app->version();
});*/

$app->get('/',                              ['as' => 'agenda.index',        'uses' => 'AgendaController@index']);
$app->get('/createContato',                 ['as' => 'agenda.createContato','uses' => 'AgendaController@createContato']);
$app->post('/Contato',                      ['as' => 'agenda.contato',      'uses' => 'AgendaController@storeContato']);
$app->get('/{letra}',                       ['as' => 'agenda.letra',        'uses' => 'AgendaController@index']);
$app->post('/busca',                        ['as' => 'agenda.busca',        'uses' => 'AgendaController@busca']);

$app->get('/{id}/deletePessoa',             ['as' => 'agenda.deletePessoa','uses' => 'AgendaController@deletePessoa']);
$app->get('/{id}/deleteFone',               ['as' => 'agenda.deleteFone',  'uses' => 'AgendaController@deleteFone']);

$app->delete('/{id}/destroyPessoa',        ['as' => 'agenda.destroyPessoa','uses' => 'AgendaController@destroyPessoa']);
$app->delete('/{id}/destroyFone',          ['as' => 'agenda.destroyFone',  'uses' => 'AgendaController@destroyFone']);
