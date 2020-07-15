<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    //relaciones
    public function carteleras()
    {
        return $this->hasMany('App\Cartelera');
    }
}
