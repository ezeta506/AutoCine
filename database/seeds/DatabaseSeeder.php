<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ClasificacionSeeder::class);
        $this->call(ClasifproductoSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(TipoproductoSeeder::class);
        $this->call(UbicacionSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(PeliculaSeeder::class);
        $this->call(VotopeliculaSeeder::class);
        $this->call(VotoproductoSeeder::class);
        $this->call(DislikepeliculaSeeder::class);
        $this->call(DislikeproductoSeeder::class);
        $this->call(TiqueteSeeder::class);
        $this->call(CarteleraSeeder::class);
    }
}
