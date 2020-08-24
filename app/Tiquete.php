<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiquete extends Model
{
    //Relaciones

    public function cartelerass()
    {
        return $this->belongsToMany('App\Cartelera');
    }

    public function encabezados()
    {
        return $this->belongsToMany('App\Encabezado')->withPivot(['cantidad']);
    }
}
