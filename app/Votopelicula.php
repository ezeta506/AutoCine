<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votopelicula extends Model
{
    //relaciones
    public function pelicula()
    {
        return $this->belongsTo('App\Pelicula');
    }
}
