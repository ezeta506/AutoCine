<?php

use Illuminate\Database\Seeder;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ubicacion = new \App\Ubicacion();
        $ubicacion->name = "Playa Hermosa";
        $ubicacion->capacidadCarro = 100;
        $ubicacion->capacidadMoto = 100;
        $ubicacion->estado = true;
        $ubicacion->save();

        $ubicacion = new \App\Ubicacion();
        $ubicacion->name = "Tamarindo";
        $ubicacion->capacidadCarro = 150;
        $ubicacion->capacidadMoto = 60;
        $ubicacion->estado = true;
        $ubicacion->save();

        $ubicacion = new \App\Ubicacion();
        $ubicacion->name = "Manuel Antonio";
        $ubicacion->capacidadCarro = 150;
        $ubicacion->capacidadMoto = 60;
        $ubicacion->estado = true;
        $ubicacion->save();

        $ubicacion = new \App\Ubicacion();
        $ubicacion->name = "Puerto Viejo";
        $ubicacion->capacidadCarro = 150;
        $ubicacion->capacidadMoto = 60;
        $ubicacion->estado = true;
        $ubicacion->save();
    }
}
