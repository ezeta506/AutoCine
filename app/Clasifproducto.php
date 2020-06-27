<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasifproducto extends Model
{
    //relaciones

    public function productos()
    {
        return $this->belongsToMany('App\Producto');
    }
}
