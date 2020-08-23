<?php

namespace App\Http\Controllers;

use App\Encabezado;
use Illuminate\Http\Request;
use JWTAuth;

class EncabezadoController extends Controller
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
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                //no dejar espacios
                'fechaHoraVenta' => 'required|date',
                'user_id' => 'required',
                'impuesto' => 'required',
                'total' => 'required',
                'estado' => 'required'
            ]);
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['msg' => 'Usuario no encontrado'], 404);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {

            return $this->responseErrors($e->errors(), 422);
        }
        //instancia de pelicula
        //tambien se puede poner el nombre del campo sin el input
        $encabezado = new Encabezado();
        $encabezado->fechaHoraVenta = $request->input('fechaHoraVenta');
        $encabezado->user_id = $request->input('user_id');
        $encabezado->impuesto = $request->input('impuesto');
        $encabezado->total = $request->input('total');
        $encabezado->estado = $request->input('estado');
        //tres iguales es para comparar que tenga el valor y el tipo
        // los request son las entradas
        //si no hay generos le asigna uno vacio, si hay le asigno el que viene
        //el atach toma el id de peli y el de generos y los guarda en la tabla intermedia
        // si ocupo en un array le puedo enviar más datos a la tabla intermedi. ver documentación
        if ($encabezado->save()) {
            $encabezado->carteleras()->attach( $request->input('carteleras') === null ? [] : $request->input('carteleras'), ['cantidad']);
            $response = 'Factura creada';
            return response()->json($response, 201);
        } else {
            $response = ['msg' => 'error durante la creacion'];
            return response()->json($response, 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Encabezado  $encabezado
     * @return \Illuminate\Http\Response
     */
    public function show(Encabezado $encabezado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Encabezado  $encabezado
     * @return \Illuminate\Http\Response
     */
    public function edit(Encabezado $encabezado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Encabezado  $encabezado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encabezado $encabezado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Encabezado  $encabezado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encabezado $encabezado)
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
