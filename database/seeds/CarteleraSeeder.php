<?php

use Illuminate\Database\Seeder;

class CarteleraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $cartelera = new \App\Cartelera();
        $cartelera->fechaHora = '2020-08-29';
        $cartelera->pelicula_id = 1;
        $cartelera->ubicacion_id = 1;
        $cartelera->estado = true;
        $cartelera->save();
        $cartelera->tiquetes()->attach([1,2]);

        $cartelera = new \App\Cartelera();
        $cartelera->fechaHora = '2020-08-29';
        $cartelera->pelicula_id = 2;
        $cartelera->ubicacion_id = 1;
        $cartelera->estado = true;
        $cartelera->save();
        $cartelera->tiquetes()->attach([1, 2]);

        $cartelera = new \App\Cartelera();
        $cartelera->fechaHora = '2020-08-29';
        $cartelera->pelicula_id = 3;
        $cartelera->ubicacion_id = 2;
        $cartelera->estado = true;
        $cartelera->save();
        $cartelera->tiquetes()->attach([1, 2]);

        $cartelera = new \App\Cartelera();
        $cartelera->fechaHora = '2020-08-29';
        $cartelera->pelicula_id = 4;
        $cartelera->ubicacion_id = 2;
        $cartelera->estado = true;
        $cartelera->save();
        $cartelera->tiquetes()->attach([1, 2]);

    }
}
