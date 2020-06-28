<?php

use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto = new \App\Producto();
        $producto->name = "Coca Cola";
        $producto->descripcion = "Bebida gaseosa";
        $producto->imagen = "";
        $producto->tipoproducto_id = 1;
        $producto->precio = 1000;
        $producto->estado = true;
        $producto->save();

        $producto = new \App\Producto();
        $producto->name = "Choco Banano";
        $producto->descripcion = "Helado de chocolate y banano";
        $producto->imagen = "";
        $producto->tipoproducto_id = 2;
        $producto->precio = 1200;
        $producto->estado = true;
        $producto->save();

        $producto = new \App\Producto();
        $producto->name = "Palomitas";
        $producto->descripcion = "palomitas de maiz";
        $producto->imagen = "";
        $producto->tipoproducto_id = 3;
        $producto->precio = 2500;
        $producto->estado = true;
        $producto->save();
    }
}
