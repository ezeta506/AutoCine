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
        //primer parametro el nombre por el que nos referimos a la ruta
        //segundo el controlador y la accion que va a llamar
        Route::get('', 'PeliculaController@index');
        Route::get('peliculaDeshabilitada', 'PeliculaController@peliculaDeshabilitada');
        Route::get('clasificacion', 'ClasificacionController@index');
        Route::get('genero', 'GeneroController@index');
        Route::post('', 'PeliculaController@store');
        Route::post('/{id}', 'VotopeliculaController@store');
        Route::post('dislike/{id}', 'DislikepeliculaController@store');
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
        //primer parametro el nombre por el que nos referimos a la ruta
        //segundo el controlador y la accion que va a llamar
        Route::get('', 'ProductoController@index');
        Route::get('productoDeshabilitado', 'ProductoController@productoDeshabilitado');
        Route::get('tipoproducto', 'TipoproductoController@index');
        Route::get('clasifproducto', 'ClasifproductoController@index');
        Route::post('', 'ProductoController@store');
        //  Route::post('/{id}', 'VotoproductoController@store');
        Route::post('/{id}', 'DislikeproductoController@store');
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
        Route::get('', 'CarteleraController@index');
        Route::post('', 'CarteleraController@store');
    });
});
