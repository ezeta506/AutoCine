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
        $producto->imagen = "./assets/img_productos/CocaCola.jpg";
        $producto->tipoproducto_id = 1;
        $producto->precio = 1000;
        $producto->estado = true;
        $producto->save();

        $producto = new \App\Producto();
        $producto->name = "Choco Banano";
        $producto->descripcion = "Helado de chocolate y banano";
        $producto->imagen = "./assets/img_productos/Chocobanano.jpg";
        $producto->tipoproducto_id = 4;
        $producto->precio = 1200;
        $producto->estado = true;
        $producto->save();

        $producto = new \App\Producto();
        $producto->name = "Palomitas";
        $producto->descripcion = "palomitas de maiz";
        $producto->imagen = "./assets/img_productos/Palomitas.png";
        $producto->tipoproducto_id = 3;
        $producto->precio = 2500;
        $producto->estado = true;
        $producto->save();

        $producto = new \App\Producto();
        $producto->name = "Tacos";
        $producto->descripcion = "Tacos de maiz con queso, carne mechada, salsas, tomate, lechuga y aguacate";
        $producto->imagen = "./assets/img_productos/Tacos.jpg";
        $producto->tipoproducto_id = 3;
        $producto->precio = 2400;
        $producto->estado = true;
        $producto->save();

        $producto = new \App\Producto();
        $producto->name = "Hamburguesa";
        $producto->descripcion = "Hamburguesa con torta de carne, mortadela, salsas, tomate, lechuga, queso y cebolla";
        $producto->imagen = "./assets/img_productos/Hamburguesa.jpg";
        $producto->tipoproducto_id = 3;
        $producto->precio = 3100;
        $producto->estado = true;
        $producto->save();

        $producto = new \App\Producto();
        $producto->name = "Hot Dog";
        $producto->descripcion = "Perro caliente con salchicha de pavo, queso, salsas y pan";
        $producto->imagen = "./assets/img_productos/Hot dog.jpeg";
        $producto->tipoproducto_id = 3;
        $producto->precio = 1200;
        $producto->estado = true;
        $producto->save();

        $producto = new \App\Producto();
        $producto->name = "Paleta";
        $producto->descripcion = "Helado de paleta de diferentes sabores";
        $producto->imagen = "./assets/img_productos/Paletas.jpg";
        $producto->tipoproducto_id = 4;
        $producto->precio = 450;
        $producto->estado = true;
        $producto->save();

        $producto = new \App\Producto();
        $producto->name = "Apretados";
        $producto->descripcion = "Apretados de diferentes sabores";
        $producto->imagen = "./assets/img_productos/Apretados.jpg";
        $producto->tipoproducto_id = 4;
        $producto->precio = 350;
        $producto->estado = true;
        $producto->save();

        $producto = new \App\Producto();
        $producto->name = "Refresco Natural";
        $producto->descripcion = "Refrescos naturales de diferentes sabores";
        $producto->imagen = "./assets/img_productos/Refresco Natural.jpg";
        $producto->tipoproducto_id = 1;
        $producto->precio = 550;
        $producto->estado = true;
        $producto->save();
    }
}
