<?php

namespace App\Http\Controllers;

use App\Cartelera;
use Illuminate\Http\Request;

class CarteleraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //traer todas las columnas, no tengo que dar formato
            // $peli=Pelicula::all();

            //withcount, poner nombre del metodo en el modelo con la relacion
            // $peli = Pelicula::orderBy('clasificacion_id', 'desc')->withCount('votopeliculas')->get();

            $carte = Cartelera::where('estado', true)->get();
            //mostrar consulta en una respuesta
            //en formato json
            //armar array
            $response = $carte;

            //response autocompletado
            // 200 es ok
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function filtroUbicacion($id)
    {

        try {
            //traer todas las columnas, no tengo que dar formato
            // $peli=Pelicula::all();

            //withcount, poner nombre del metodo en el modelo con la relacion
            // $peli = Pelicula::orderBy('clasificacion_id', 'desc')->withCount('votopeliculas')->get();

            $carte = Cartelera::where('id', $id)->orderBy('ubicacion_id', 'desc')->with(['ubicacion'])->first();
            //mostrar consulta en una respuesta
            //en formato json
            //armar array
            $response = $carte;

            //response autocompletado
            // 200 es ok
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cartelera  $cartelera
     * @return \Illuminate\Http\Response
     */
    public function show(Cartelera $cartelera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cartelera  $cartelera
     * @return \Illuminate\Http\Response
     */
    public function edit(Cartelera $cartelera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cartelera  $cartelera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cartelera $cartelera)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cartelera  $cartelera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cartelera $cartelera)
    {
        //
    }
}
