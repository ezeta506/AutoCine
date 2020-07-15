<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoproducto extends Model
{
    //relaciones

    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
