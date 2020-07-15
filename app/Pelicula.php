<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{

    //relaciones

    public function clasificacion()
    {
        return $this->belongsTo('App\Clasificacion');
    }

    public function generos()
    {
        return $this->belongsToMany('App\Genero');
    }

    //  public function votos()
    // {
    //    return $this->belongsToMany('App\voto');
    //}

    public function votopeliculas()
    {
        return $this->hasMany('App\Votopelicula');
    }

    public function carteleras()
    {
        return $this->hasMany('App\Cartelera');
    }
}
