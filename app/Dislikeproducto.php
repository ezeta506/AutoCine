<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dislikeproducto extends Model
{
    //relaciones
    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
