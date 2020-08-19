<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use JWTAuth;

class ProductoController extends Controller
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
    public function index()
    {

        try {
            //traer todas las columnas, no tengo que dar formato
            // $peli=Pelicula::all();

            //withcount, poner nombre del metodo en el modelo con la relacion
            // $peli = Pelicula::orderBy('clasificacion_id', 'desc')->withCount('votopeliculas')->get();

            $peli = Producto::where('estado', true)->orderBy('tipoproducto_id', 'desc')->withCount('votoproductoss')->get();
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

    public function productoDeshabilitado()
    {

        try {
            //traer todas las columnas, no tengo que dar formato
            // $peli=Pelicula::all();

            //withcount, poner nombre del metodo en el modelo con la relacion
            // $peli = Pelicula::orderBy('clasificacion_id', 'desc')->withCount('votopeliculas')->get();

            $peli = Producto::where('estado', false)->orderBy('tipoproducto_id', 'desc')->withCount('votoproductoss')->get();
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

    public function filtroId($id)
    {

        try {
            //traer todas las columnas, no tengo que dar formato
            // $peli=Pelicula::all();

            //withcount, poner nombre del metodo en el modelo con la relacion
            // $peli = Pelicula::orderBy('clasificacion_id', 'desc')->withCount('votopeliculas')->get();

            $peli = Producto::where('id', $id)->orderBy('tipoproducto_id', 'desc')->withCount('votoproductoss')->with(['tipoproducto', 'clasifproductos'])->first();
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
                'name' => 'required|min:3',
                'descripcion' => 'required|min:20',
                'imagen' => 'required',
                'tipoproducto_id' => 'required',
                'precio' => 'required',
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
        $pro = new Producto();
        $pro->name = $request->input('name');
        $pro->descripcion = $request->input('descripcion');
        $pro->imagen = $request->input('imagen');
        $pro->tipoproducto_id = $request->input('tipoproducto_id');
        $pro->precio = $request->input('precio');
        $pro->estado = $request->input('estado');
        //tres iguales es para comparar que tenga el valor y el tipo
        // los request son las entradas
        //si no hay generos le asigna uno vacio, si hay le asigno el que viene
        //el atach toma el id de peli y el de generos y los guarda en la tabla intermedia
        // si ocupo en un array le puedo enviar más datos a la tabla intermedi. ver documentación
        if ($pro->save()) {
            $pro->clasifproductos()->attach(
                $request->input('clasifproductos') === null ? [] : $request->input('clasifproductos')
            );
            $response = 'producto creado';
            return response()->json($response, 201);
        } else {
            $response = ['msg' => 'error durante la creacion'];
            return response()->json($response, 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
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
