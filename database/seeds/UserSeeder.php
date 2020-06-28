<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //llenado como array
        //bcrypt('123456') es para encriptar contrasenas
        $objetoUser = \App\User::create([
            'name' => 'Carlos',
            'apellido1' => 'Ezeta',
            'apellido2' => 'Alvarado',
            'email' => 'usuario1@gmail.com',
            'password' => bcrypt('123456'),
            'rol_id' => 1,
            'estado' => true
        ]);

        $objetoUser = \App\User::create([
            'name' => 'Cristopher',
            'apellido1' => 'Villafuerte',
            'apellido2' => 'Torres',
            'email' => 'usuario2@gmail.com',
            'password' => bcrypt('123456'),
            'rol_id' => 1,
            'estado' => true
        ]);

        $objetoUser = \App\User::create([
            'name' => 'Maria',
            'apellido1' => 'Soto',
            'apellido2' => 'Soto',
            'email' => 'usuario3@gmail.com',
            'password' => bcrypt('123456'),
            'rol_id' => 2,
            'estado' => true
        ]);
    }
}
