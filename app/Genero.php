<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    //relaciones

    public function peliculass()
    {
        return $this->belongsToMany('App\Pelicula');
    }
}
