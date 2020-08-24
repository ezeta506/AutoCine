<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encabezado extends Model
{
    //relaciones
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function cartelera()
    {
        return $this->belongsTo('App\Cartelera');
    }

    public function tiquetes()
    {
        return $this->belongsToMany('App\Tiquete')->withPivot(['cantidad']);
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto');
    }
}
