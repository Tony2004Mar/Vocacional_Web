<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Asegúrate que existan registros en generos y niveles_educativos con id 1 o cambia los id.
        User::create([
            'nombre' => 'Admin',
            'ap' => 'Sistema',
            'am' => 'Root',
            'edad' => 30,
            'genero_id' => 1,
            'nivel_educativo_id' => 1,
            'intereses' => 'Administrar la plataforma',
            'email' => 'admin@riasec.local',
            'password' => Hash::make('root1234'),
            'rol' => 'administrador',
        ]);
    }
}
