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
        //primer parametro el nombre por el que nos referimos a la ruta
        //segundo el controlador y la accion que va a llamar
        Route::get('', 'ProductoController@index');
        Route::get('/{id}', 'ProductoController@filtroId');
    });
});
