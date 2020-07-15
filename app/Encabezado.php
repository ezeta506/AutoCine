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

    public function carteleras()
    {
        return $this->belongsToMany('App\Cartelera');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto');
    }
}
