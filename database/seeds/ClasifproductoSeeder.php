<?php

use Illuminate\Database\Seeder;

class ClasifproductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clasificacion = new \App\Clasifproducto();
        $clasificacion->name = "Pequeño";
        $clasificacion->valor = 0.05;
        $clasificacion->estado = true;
        $clasificacion->save();

        $clasificacion = new \App\Clasifproducto();
        $clasificacion->name = "Mediano";
        $clasificacion->valor = 0.10;
        $clasificacion->estado = true;
        $clasificacion->save();

        $clasificacion = new \App\Clasifproducto();
        $clasificacion->name = "Grande";
        $clasificacion->valor = 0.15;
        $clasificacion->estado = true;
        $clasificacion->save();
    }
}
