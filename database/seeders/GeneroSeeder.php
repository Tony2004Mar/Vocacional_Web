<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    public function run(): void
    {
        $generos = [
            ['descripcion' => 'Masculino'],
            ['descripcion' => 'Femenino'],
            ['descripcion' => 'Prefiero no decir'],
        ];

        foreach ($generos as $genero) {
            Genero::create($genero);
        }
    }
}
