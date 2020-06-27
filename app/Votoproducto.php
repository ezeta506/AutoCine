<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votoproducto extends Model
{
    //relaciones
    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
