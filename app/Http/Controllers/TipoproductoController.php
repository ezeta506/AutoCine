<?php

namespace App\Http\Controllers;

use App\Tipoproducto;
use Illuminate\Http\Request;

class TipoproductoController extends Controller
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

            $tipoPro = Tipoproducto::where('estado', true)->get();
            //mostrar consulta en una respuesta
            //en formato json
            //armar array
            $response = $tipoPro;

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
     * @param  \App\Tipoproducto  $tipoproducto
     * @return \Illuminate\Http\Response
     */
    public function show(Tipoproducto $tipoproducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipoproducto  $tipoproducto
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipoproducto $tipoproducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipoproducto  $tipoproducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipoproducto $tipoproducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipoproducto  $tipoproducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipoproducto $tipoproducto)
    {
        //
    }
}
