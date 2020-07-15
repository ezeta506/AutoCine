<?php

use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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

//prefix es la palabra que se agrega a la url
Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'peliculas'], function () {
        //primer parametro el nombre por el que nos referimos a la ruta
        //segundo el controlador y la accion que va a llamar
        Route::get('', 'PeliculaController@index');
    });
});

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'peliculasfiltro'], function () {
        //primer parametro es el parametro que vamos a enviar en la busqueda
        //segundo el controlador y la accion que va a llamar

        Route::get('/{id}', 'PeliculaController@filtroNombre');
    });
});

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'productos'], function () {
        //primer parametro el nombre por el que nos referimos a la ruta
        //segundo el controlador y la accion que va a llamar
        Route::get('', 'ProductoController@index');
        Route::get('/{id}', 'ProductoController@filtroId');
    });
});
