<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dislikepelicula extends Model
{
    //relaciones
    public function pelicula()
    {
        return $this->belongsTo('App\Pelicula');
    }
}
