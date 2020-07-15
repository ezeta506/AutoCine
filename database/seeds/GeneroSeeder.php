<?php

use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genero = new \App\Genero();
        $genero->name = "Acción";
        $genero->estado = true;
        $genero->save();

        $genero = new \App\Genero();
        $genero->name = "Terror";
        $genero->estado = true;
        $genero->save();

        $genero = new \App\Genero();
        $genero->name = "Comedia";
        $genero->estado = true;
        $genero->save();

        $genero = new \App\Genero();
        $genero->name = "Drama";
        $genero->estado = true;
        $genero->save();

        $genero = new \App\Genero();
        $genero->name = "Romance";
        $genero->estado = true;
        $genero->save();
    }
}
