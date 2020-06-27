<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    //relaciones
    public function peliculas()
    {
        return $this->belongsToMany('App\Pelicula');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto');
    }
}
