<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;



    /**
     * The attributes that are mass assignable.
     *prueba git
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //metodos de las relaciones

    //nombre del metodo: si es belongsTo se bebe ser un nombre en singular
    //nombre del modelo con el que me relaciono
    //App, hace referencia a la carpeta dondo estoy
    //segundo parametro es con quien establezco la relacion
    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }

    public function encabezados()
    {
        return $this->hasMany('App\Encabezado');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
