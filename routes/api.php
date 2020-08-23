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
        Route::group(['prefix' => 'auth'], function ($router) {
            Route::post('register', 'AuthController@register');
            Route::post('login', 'AuthController@login');
            Route::post('logout', 'AuthController@logout');
            Route::post('refresh', 'AuthController@refresh');
            Route::post('me', 'AuthController@me');
        });

        Route::group([
            'prefix' => 'dislike'
        ], function ($router) {
            Route::get('/{id}', 'DislikepeliculaController@store');
        });

        Route::group([
            'prefix' => 'like'
        ], function ($router) {
            Route::get('/{id}', 'VotopeliculaController@store');
        });
        //primer parametro el nombre por el que nos referimos a la ruta
        //segundo el controlador y la accion que va a llamar
        Route::get('', 'PeliculaController@index');
        Route::get('peliculaDeshabilitada', 'PeliculaController@peliculaDeshabilitada');
        Route::get('clasificacion', 'ClasificacionController@index');
        Route::get('genero', 'GeneroController@index');
        Route::post('', 'PeliculaController@store');
        Route::patch('/{id}', 'PeliculaController@update');
        Route::get('/{id}', 'PeliculaController@filtroNombre');
    });
});



Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'productos'], function () {
        Route::group(['prefix' => 'auth'], function ($router) {
            Route::post('register', 'AuthController@register');
            Route::post('login', 'AuthController@login');
            Route::post('logout', 'AuthController@logout');
            Route::post('refresh', 'AuthController@refresh');
            Route::post('me', 'AuthController@me');
        });
        //Rutas roles
        Route::group([
            'prefix' => 'dislike'
        ], function ($router) {
            Route::get('/{id}', 'DislikeproductoController@store');
        });
        Route::group([
            'prefix' => 'like'
        ], function ($router) {
            Route::get('/{id}', 'VotoproductoController@store');
        });
        //primer parametro el nombre por el que nos referimos a la ruta
        //segundo el controlador y la accion que va a llamar
        Route::get('', 'ProductoController@index');
        Route::get('productoDeshabilitado', 'ProductoController@productoDeshabilitado');
        Route::get('tipoproducto', 'TipoproductoController@index');
        Route::get('clasifproducto', 'ClasifproductoController@index');
        Route::post('', 'ProductoController@store');
        Route::patch('/{id}', 'ProductoController@update');
        Route::get('/{id}', 'ProductoController@filtroId');
    });
});


//prefix es la palabra que se agrega a la url
Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'carteleras'], function () {

        //primer parametro el nombre por el que nos referimos a la ruta
        //segundo el controlador y la accion que va a llamar
        Route::get('ubicacion', 'UbicacionController@index');
        Route::get('tiquete', 'TiqueteController@index');
        Route::get('Deshabilitado', 'CarteleraController@getCarteleraDeshabilitado');
        Route::get('', 'CarteleraController@index');
        Route::post('', 'CarteleraController@store');
        Route::patch('/{id}', 'CarteleraController@update');
        Route::get('/{id}', 'CarteleraController@filtroUbicacion');
        Route::get('id/{id}', 'CarteleraController@filtroId');
    });
});

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'encabezados'], function () {

        //primer parametro el nombre por el que nos referimos a la ruta
        //segundo el controlador y la accion que va a llamar

        Route::post('', 'EncabezadoController@store');
    });
});
