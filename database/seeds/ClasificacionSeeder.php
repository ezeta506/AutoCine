<?php

use Illuminate\Database\Seeder;

class ClasificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clasificacion = new \App\Clasificacion();
        $clasificacion->descripcion="Todo público";
        $clasificacion->save();

        $clasificacion = new \App\Clasificacion();
        $clasificacion->descripcion = "Mayores de 16 años";
        $clasificacion->save();

        $clasificacion = new \App\Clasificacion();
        $clasificacion->descripcion = "Mayores de 18 años";
        $clasificacion->save();

    }
}
