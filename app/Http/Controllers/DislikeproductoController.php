<?php

namespace App\Http\Controllers;

use App\Dislikeproducto;
use Illuminate\Http\Request;

class DislikeproductoController extends Controller
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
        $pro = Producto::with('dislikeproductos')->findOrFail($id);
        $dispro = new Dislikeproducto();
        if ($pro->dislikeproductos()->save($dispro)) {

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
     * @param  \App\Dislikeproducto  $dislikeproducto
     * @return \Illuminate\Http\Response
     */
    public function show(Dislikeproducto $dislikeproducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dislikeproducto  $dislikeproducto
     * @return \Illuminate\Http\Response
     */
    public function edit(Dislikeproducto $dislikeproducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dislikeproducto  $dislikeproducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dislikeproducto $dislikeproducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dislikeproducto  $dislikeproducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dislikeproducto $dislikeproducto)
    {
        //
    }

    public function responseErrors($errors, $statusHTML)
    {
        $transformed = [];

        foreach ($errors as $field => $message) {
            $transformed[] = [
                'field' => $field,
                'message' => $message[0]
            ];
        }

        return response()->json([
            'errors' => $transformed
        ], $statusHTML);
    }
}
