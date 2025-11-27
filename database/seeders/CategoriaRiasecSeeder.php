<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaRiasecSeeder extends Seeder
{
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');


        DB::table('categorias_riasec')->truncate();


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        DB::table('categorias_riasec')->insert([
            ['codigo' => 'R', 'nombre' => 'Realista'],
            ['codigo' => 'I', 'nombre' => 'Investigador'],
            ['codigo' => 'A', 'nombre' => 'Artístico'],
            ['codigo' => 'S', 'nombre' => 'Social'],
            ['codigo' => 'E', 'nombre' => 'Emprendedor'],
            ['codigo' => 'C', 'nombre' => 'Convencional'],
        ]);
    }
}
