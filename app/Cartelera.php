<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartelera extends Model
{
    //relaciones

    public function pelicula()
    {
        return $this->belongsTo('App\Pelicula');
    }

    public function ubicacion()
    {
        return $this->belongsTo('App\Ubicacion');
    }

    public function tiquetes()
    {
        return $this->belongsToMany('App\Tiquete');
    }

    public function encabezados()
    {
        return $this->belongsToMany('App\Encabezado');
    }
}
