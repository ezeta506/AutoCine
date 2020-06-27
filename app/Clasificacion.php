<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    public function peliculas()
    {
        return $this->hasMany('App\Pelicula');
    }
}
