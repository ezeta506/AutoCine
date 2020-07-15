<?php

use Illuminate\Database\Seeder;

class TipoproductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoproducto = new \App\Tipoproducto();
        $tipoproducto->name = "Bebidas";
        $tipoproducto->estado = true;
        $tipoproducto->save();


        $tipoproducto = new \App\Tipoproducto();
        $tipoproducto->name = "Golosinas";
        $tipoproducto->estado = true;
        $tipoproducto->save();


        $tipoproducto = new \App\Tipoproducto();
        $tipoproducto->name = "Snacks";
        $tipoproducto->estado = true;
        $tipoproducto->save();

        $tipoproducto = new \App\Tipoproducto();
        $tipoproducto->name = "Helados";
        $tipoproducto->estado = true;
        $tipoproducto->save();
    }
}
