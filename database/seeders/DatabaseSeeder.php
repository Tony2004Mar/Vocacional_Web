<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            GeneroSeeder::class,
            NivelEducativoSeeder::class,
            AdminSeeder::class,
            RiasecSeeder::class,
            CategoriaRiasecSeeder::class,
            CarreraCategoriaSeeder::class,
            EstadoSeeder::class,

        ]);

    }
}
