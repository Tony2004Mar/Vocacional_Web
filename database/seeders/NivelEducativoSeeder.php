<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NivelEducativo;

class NivelEducativoSeeder extends Seeder
{
    public function run(): void
    {
        $niveles = [
            ['descripcion' => 'Secundaria'],
            ['descripcion' => 'Bachillerato'],
            ['descripcion' => 'Técnico'],
        ];

        foreach ($niveles as $nivel) {
            NivelEducativo::create($nivel);
        }
    }
}
