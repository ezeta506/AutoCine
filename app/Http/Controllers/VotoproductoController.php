<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Votoproducto;
use Illuminate\Http\Request;

class VotoproductoController extends Controller
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
        $pro = Producto::with('votoproductos')->findOrFail($id);
        $Votopro = new Votoproducto();
        if ($pro->votoproductos()->save($Votopro)) {

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
     * @param  \App\Votoproducto  $votoproducto
     * @return \Illuminate\Http\Response
     */
    public function show(Votoproducto $votoproducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Votoproducto  $votoproducto
     * @return \Illuminate\Http\Response
     */
    public function edit(Votoproducto $votoproducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Votoproducto  $votoproducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Votoproducto $votoproducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Votoproducto  $votoproducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Votoproducto $votoproducto)
    {
        //
    }
}
