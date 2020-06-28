<?php

use Illuminate\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pelicula = new \App\Pelicula();
        $pelicula->name = "Ironman";
        $pelicula->sinopsis = "Tony hace traje de acero para luchar por la justicia";
        $pelicula->imagen = "";
        $pelicula->clasificacion_id = 1;
        $pelicula->estado = true;
        $pelicula->save();

        $pelicula = new \App\Pelicula();
        $pelicula->name = "La monja";
        $pelicula->sinopsis = "Todos están en peligro en un viejo convento";
        $pelicula->imagen = "";
        $pelicula->clasificacion_id = 2;
        $pelicula->estado = true;
        $pelicula->save();

        $pelicula = new \App\Pelicula();
        $pelicula->name = "The Notebook";
        $pelicula->sinopsis = "Relato de amor";
        $pelicula->imagen = "";
        $pelicula->clasificacion_id = 1;
        $pelicula->estado = true;
        $pelicula->save();
    }
}
