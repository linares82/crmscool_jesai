<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cliente/findBy', array(
        'as' => 'cliente.findBy',
        'uses' => 'ClientesController@findBy')
    );

Route::post('/ebanxes/notificacion',array(
    'as'=>'ebanxes.notificacion',
    'uses'=>'EbanxesController@notificacion')
    );

Route::get('/ebanxes/paisesWeb','EbanxesController@paisesWeb');

Route::get('/ebanxes/ofertaEmm',array(
    'as'=>'ebanxes.ofertaEmm',
    'uses'=>'EbanxesController@ofertaEmm')
    );

Route::get('/ebanxes/ofertaCedva',array(
    'as'=>'ebanxes.ofertaCedva',
    'uses'=>'EbanxesController@ofertaCedva')
    );