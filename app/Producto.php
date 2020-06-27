<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //relaciones

    public function tipoproducto()
    {
        return $this->belongsTo('App\tipoproducto');
    }

    public function clasifproductos()
    {
        return $this->belongsToMany('App\Clasifproducto');
    }

    public function votos()
    {
        return $this->belongsToMany('App\Voto');
    }

    public function encabezados()
    {
        return $this->belongsToMany('App\Encabezado');
    }
}
