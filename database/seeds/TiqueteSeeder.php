<?php

use Illuminate\Database\Seeder;

class TiqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiquete = new \App\Tiquete();
        $tiquete->name = "Autos";
        $tiquete->precio = 5000;
        $tiquete->estado = true;
        $tiquete->save();

        $tiquete = new \App\Tiquete();
        $tiquete->name = "Motos";
        $tiquete->precio = 3000;
        $tiquete->estado = true;
        $tiquete->save();

        $tiquete = new \App\Tiquete();
        $tiquete->name = "Bicicletas";
        $tiquete->precio = 2000;
        $tiquete->estado = false;
        $tiquete->save();
    }
}
