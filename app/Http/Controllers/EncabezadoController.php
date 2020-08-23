<?php

namespace App\Http\Controllers;

use App\Encabezado;
use Illuminate\Http\Request;

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
        $peli = new Pelicula();
        $peli->name = $request->input('name');
        $peli->sinopsis = $request->input('sinopsis');
        $peli->imagen = $request->input('imagen');
        $peli->clasificacion_id = $request->input('clasificacion_id');
        $peli->estado = $request->input('estado');
        //tres iguales es para comparar que tenga el valor y el tipo
        // los request son las entradas
        //si no hay generos le asigna uno vacio, si hay le asigno el que viene
        //el atach toma el id de peli y el de generos y los guarda en la tabla intermedia
        // si ocupo en un array le puedo enviar más datos a la tabla intermedi. ver documentación
        if ($peli->save()) {
            $peli->generos()->attach(
                $request->input('genero_id') === null ? [] : $request->input('genero_id')
            );
            $response = 'pelicula creada';
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
