<?php

namespace App\Http\Controllers;

use App\Cartelera;
use Illuminate\Http\Request;
use JWTAuth;

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

            $carte = Cartelera::where('estado', true)->where('fechaHora', '>=', date('Y-m-d'))->where('hora', '>', date('H:i:s'))->with(['pelicula', 'ubicacion', 'tiquetes'])->get();
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

    public function getCarteleraDeshabilitado()
    {
        try {
            //traer todas las columnas, no tengo que dar formato
            // $peli=Pelicula::all();

            //withcount, poner nombre del metodo en el modelo con la relacion
            // $peli = Pelicula::orderBy('clasificacion_id', 'desc')->withCount('votopeliculas')->get();

            $carte = Cartelera::where('estado', false)->where('fechaHora', '<=', date('Y-m-d'))->where('hora', '<', date('H:i:s'))->with(['pelicula', 'ubicacion', 'tiquetes'])->get();
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

    public function filtroId($id)
    {

        try {
            //traer todas las columnas, no tengo que dar formato
            // $peli=Pelicula::all();

            //withcount, poner nombre del metodo en el modelo con la relacion
            // $peli = Pelicula::orderBy('clasificacion_id', 'desc')->withCount('votopeliculas')->get();

            $carte = Cartelera::where('id', $id)->with(['pelicula', 'ubicacion', 'tiquetes'])->first();
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

            $carte = Cartelera::where('ubicacion_id', $id)->where('fechaHora', '>=', date('Y-m-d'))->where('hora', '>', date('H:i:s'))->with(['pelicula', 'ubicacion', 'tiquetes'])->get();
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
        try {
            $this->validate($request, [
                //no dejar espacios
                'fechaHora' => 'required|date',
                'hora' => 'required',
                'pelicula_id' => 'required',
                'ubicacion_id' => 'required',
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
        $carte = new Cartelera();
        $carte->fechaHora = $request->input('fechaHora');
        $carte->hora = $request->input('hora');
        $carte->pelicula_id = $request->input('pelicula_id');
        $carte->ubicacion_id = $request->input('ubicacion_id');
        $carte->estado = $request->input('estado');
        //tres iguales es para comparar que tenga el valor y el tipo
        // los request son las entradas
        //si no hay generos le asigna uno vacio, si hay le asigno el que viene
        //el atach toma el id de peli y el de generos y los guarda en la tabla intermedia
        // si ocupo en un array le puedo enviar más datos a la tabla intermedi. ver documentación
        if ($carte->save()) {
            $carte->tiquetes()->attach(
                $request->input('tiquete_id') === null ? [] : $request->input('tiquete_id')
            );
            $response = 'Cartelera creada';
            return response()->json($response, 201);
        } else {
            $response = ['msg' => 'error durante la creacion'];
            return response()->json($response, 404);
        }
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
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                //no dejar espacios
                'fechaHora' => 'required|date',
                'hora' => 'required',
                'pelicula_id' => 'required',
                'ubicacion_id' => 'required',
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
        $carte = Cartelera::find($id);
        $carte->fechaHora = $request->input('fechaHora');
        $carte->hora = $request->input('hora');
        $carte->pelicula_id = $request->input('pelicula_id');
        $carte->ubicacion_id = $request->input('ubicacion_id');
        $carte->estado = $request->input('estado');
        //tres iguales es para comparar que tenga el valor y el tipo
        // los request son las entradas
        //si no hay generos le asigna uno vacio, si hay le asigno el que viene
        //el atach toma el id de peli y el de generos y los guarda en la tabla intermedia
        // si ocupo en un array le puedo enviar más datos a la tabla intermedi. ver documentación
        if ($carte->update()) {
            $carte->tiquetes()->sync(
                $request->input('tiquete_id') === null ? [] : $request->input('tiquete_id')
            );
            $response = 'Cartelera actualizada';
            return response()->json($response, 201);
        } else {
            $response = ['msg' => 'error durante la actualización'];
            return response()->json($response, 404);
        }
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
