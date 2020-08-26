<?php

use Illuminate\Database\Seeder;

class DislikepeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $like = new \App\Dislikepelicula();
        $like->producto_id = 1;
        $like->save();

        $like = new \App\Dislikepelicula();
        $like->producto_id = 1;
        $like->save();

        $like = new \App\Dislikepelicula();
        $like->producto_id = 1;
        $like->save();

        $like = new \App\Dislikepelicula();
        $like->producto_id = 1;
        $like->save();

        $like = new \App\Dislikepelicula();
        $like->producto_id = 1;
        $like->save();

        $like = new \App\Dislikepelicula();
        $like->producto_id = 2;
        $like->save();

        $like = new \App\Dislikepelicula();
        $like->producto_id = 3;
        $like->save();

        $like = new \App\Dislikepelicula();
        $like->producto_id = 4;
        $like->save();

        $like = new \App\Dislikepelicula();
        $like->producto_id = 4;
        $like->save();

        $like = new \App\Dislikepelicula();
        $like->producto_id = 4;
        $like->save();

        $like = new \App\Dislikepelicula();
        $like->producto_id = 4;
        $like->save();

        $like = new \App\Dislikepelicula();
        $like->producto_id = 4;
        $like->save();

        $like = new \App\Dislikepelicula();
        $like->producto_id = 4;
        $like->save();
    }
}
