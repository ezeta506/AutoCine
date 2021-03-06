<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;
use JWTAuth;


class PeliculaController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //consultas para mostrar info
    public function index()
    {

        try {
            //traer todas las columnas, no tengo que dar formato
            // $peli=Pelicula::all();

            //withcount, poner nombre del metodo en el modelo con la relacion
            // $peli = Pelicula::orderBy('clasificacion_id', 'desc')->withCount('votopeliculas')->get();

            $peli = Pelicula::where('estado', true)->orderBy('clasificacion_id', 'desc')->withCount('votopeliculas')->withCount('dislikepeliculas')->with(['clasificacion', 'generos'])->get();
            //mostrar consulta en una respuesta
            //en formato json
            //armar array
            $response = $peli;

            //response autocompletado
            // 200 es ok
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function peliculaDeshabilitada()
    {

        try {
            //traer todas las columnas, no tengo que dar formato
            // $peli=Pelicula::all();

            //withcount, poner nombre del metodo en el modelo con la relacion
            // $peli = Pelicula::orderBy('clasificacion_id', 'desc')->withCount('votopeliculas')->get();

            $peli = Pelicula::where('estado', false)->orderBy('clasificacion_id', 'desc')->withCount('votopeliculas')->withCount('dislikepeliculas')->with(['clasificacion', 'generos'])->get();
            //mostrar consulta en una respuesta
            //en formato json
            //armar array
            $response = $peli;

            //response autocompletado
            // 200 es ok
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function filtroNombre($id)
    {

        try {
            //traer todas las columnas, no tengo que dar formato
            // $peli=Pelicula::all();

            //withcount, poner nombre del metodo en el modelo con la relacion
            // $peli = Pelicula::orderBy('clasificacion_id', 'desc')->withCount('votopeliculas')->get();

            $peli = Pelicula::where('id', $id)->orderBy('clasificacion_id', 'desc')->withCount('votopeliculas')->withCount('dislikepeliculas')->with(['clasificacion', 'generos'])->first();
            //mostrar consulta en una respuesta
            //en formato json
            //armar array
            $response = $peli;

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
                'name' => 'required|min:2',
                'sinopsis' => 'required|min:20',
                'imagen' => 'required',
                'clasificacion_id' => 'required',
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
     * @param  \App\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $pelicula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelicula $pelicula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                //no dejar espacios
                'name' => 'required|min:2',
                'sinopsis' => 'required|min:20',
                'imagen' => 'required',
                'clasificacion_id' => 'required',
                'estado' => 'required'
            ]);
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['msg' => 'Usuario no encontrado'], 404);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }

        $peli = Pelicula::find($id);
        $peli->name = $request->input('name');
        $peli->sinopsis = $request->input('sinopsis');
        $peli->imagen = $request->input('imagen');
        $peli->clasificacion_id = $request->input('clasificacion_id');
        $peli->estado = $request->input('estado');

        if ($peli->update()) {
            $peli->generos()->sync(
                $request->input('genero_id') === null ? [] : $request->input('genero_id')
            );
            $response = 'pelicula actualizada';
            return response()->json($response, 200);
        } else {
            $response = ['msg' => 'error durante la actualización'];
            return response()->json($response, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelicula $pelicula)
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
