<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = new \App\Rol();
        $rol->name = "Administrador";
        $rol->descripcion = "administrador";
        $rol->save();


        $rol = new \App\Rol();
        $rol->name = "Cliente";
        $rol->descripcion = "cliente";
        $rol->save();
    }
}
