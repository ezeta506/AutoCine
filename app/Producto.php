<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //relaciones

    public function tipoproducto()
    {
        return $this->belongsTo('App\Tipoproducto');
    }

    public function clasifproductos()
    {
        return $this->belongsToMany('App\Clasifproducto');
    }

    //  public function votos()
    //  {
    //       return $this->belongsToMany('App\Voto');
    //  }

    public function encabezados()
    {
        return $this->belongsToMany('App\Encabezado');
    }

    public function votoproductos()
    {
        return $this->hasMany('App\Votoproducto');
    }

    public function dislikeproductos()
    {
        return $this->hasMany('App\Dislikeproducto');
    }
}
