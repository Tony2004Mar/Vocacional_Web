<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estados')->insert([
            ['nombre' => 'en_progreso', 'descripcion' => 'El test está actualmente en progreso', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'finalizado', 'descripcion' => 'El test ha sido completado por el alumno', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'pendiente', 'descripcion' => 'El test aún no ha concluido', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
