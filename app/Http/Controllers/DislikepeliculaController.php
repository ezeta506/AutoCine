<?php

namespace App\Http\Controllers;

use App\Dislikepelicula;
use App\Pelicula;
use Illuminate\Http\Request;

class DislikepeliculaController extends Controller
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
        $peli = Pelicula::with('dislikepeliculas')->findOrFail($id);
        $dispelicula = new Dislikepelicula();
        if ($peli->dislikepeliculas()->save($dispelicula)) {

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
     * @param  \App\Dislikepelicula  $dislikepelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Dislikepelicula $dislikepelicula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dislikepelicula  $dislikepelicula
     * @return \Illuminate\Http\Response
     */
    public function edit(Dislikepelicula $dislikepelicula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dislikepelicula  $dislikepelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dislikepelicula $dislikepelicula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dislikepelicula  $dislikepelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dislikepelicula $dislikepelicula)
    {
        //
    }
}
