<?php

namespace App\Http\Controllers;

use App\Pelicula;
use App\Votopelicula;
use Illuminate\Http\Request;

class VotopeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store($id)
    {
        $peli = Pelicula::with('votopeliculas')->findOrFail($id);
        $Votopelicula = new Votopelicula();
        if ($peli->votopeliculas()->save($Votopelicula)) {

            return response()->json('Voto registrado!', 201);
        }

        $response = [
            'msg' => 'Error durante el registro del voto'
        ];

        return response()->json($response, 404);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Votopelicula  $votopelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Votopelicula $votopelicula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Votopelicula  $votopelicula
     * @return \Illuminate\Http\Response
     */
    public function edit(Votopelicula $votopelicula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Votopelicula  $votopelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Votopelicula $votopelicula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Votopelicula  $votopelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Votopelicula $votopelicula)
    {
        //
    }
}
