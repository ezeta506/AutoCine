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
        $pelicula->imagen = "./assets/img_productos/ironman.jpg";
        $pelicula->clasificacion_id = 1;
        $pelicula->estado = true;
        $pelicula->save();
        $pelicula->generos()->attach([1, 4]);

        $pelicula = new \App\Pelicula();
        $pelicula->name = "La monja";
        $pelicula->sinopsis = "Todos están en peligro en un viejo convento";
        $pelicula->imagen = "./assets/img_productos/monja.jpg";
        $pelicula->clasificacion_id = 2;
        $pelicula->estado = true;
        $pelicula->save();
        $pelicula->generos()->attach([2, 4]);

        $pelicula = new \App\Pelicula();
        $pelicula->name = "The Notebook";
        $pelicula->sinopsis = "Relato de amor";
        $pelicula->imagen = "./assets/img_productos/notebook.jpg";
        $pelicula->clasificacion_id = 1;
        $pelicula->estado = true;
        $pelicula->save();
        $pelicula->generos()->attach([4, 5]);

        $pelicula = new \App\Pelicula();
        $pelicula->name = "La momia";
        $pelicula->sinopsis = "Las leyendas se hacen realidad en Egipto";
        $pelicula->imagen = "./assets/img_productos/momia.jpg";
        $pelicula->clasificacion_id = 2;
        $pelicula->estado = false;
        $pelicula->save();
        $pelicula->generos()->attach([1,2]);
    }
}
