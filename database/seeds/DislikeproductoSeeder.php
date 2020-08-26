<?php

use Illuminate\Database\Seeder;

class DislikeproductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $like = new \App\Dislikeproducto();
        $like->producto_id = 8;
        $like->save();

        $like = new \App\Dislikeproducto();
        $like->producto_id = 8;
        $like->save();

        $like = new \App\Dislikeproducto();
        $like->producto_id = 8;
        $like->save();

        $like = new \App\Dislikeproducto();
        $like->producto_id = 8;
        $like->save();

        $like = new \App\Dislikeproducto();
        $like->producto_id = 8;
        $like->save();

        $like = new \App\Dislikeproducto();
        $like->producto_id = 1;
        $like->save();

        $like = new \App\Dislikeproducto();
        $like->producto_id = 1;
        $like->save();

        $like = new \App\Dislikeproducto();
        $like->producto_id = 1;
        $like->save();

        $like = new \App\Dislikeproducto();
        $like->producto_id = 2;
        $like->save();

        $like = new \App\Dislikeproducto();
        $like->producto_id = 3;
        $like->save();

        $like = new \App\Dislikeproducto();
        $like->producto_id = 4;
        $like->save();

        $like = new \App\Dislikeproducto();
        $like->producto_id = 5;
        $like->save();

        $like = new \App\Dislikeproducto();
        $like->producto_id = 6;
        $like->save();

        $like = new \App\Dislikeproducto();
        $like->producto_id = 7;
        $like->save();
    }
}
