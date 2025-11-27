<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraCategoriaSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('carrera_categoria')->truncate();
        DB::table('carreras')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $datos = [
            'R' => [
                'Ingeniería Mecánica',
                'Ingeniería Automotriz',
                'Ingeniería Civil',
                'Arquitectura',
                'Veterinaria',
                'Agronomía',
                'Ingeniería en Sistemas Automotrices',
                'Gastronomía',
                'Ingeniería en Manufactura',
                'Ingeniería en Mantenimiento Industrial',
                'Ingeniería Topográfica',
                'Ingeniería en Recursos Naturales',
                'Mecánica Agrícola',
                'Ingeniería en Energías Renovables',
            ],
            'I' => [
                'Matemáticas',
                'Física',
                'Química',
                'Biología',
                'Investigación Biomédica',
                'Ingeniería en Biotecnología',
                'Actuaría',
                'Estadística',
                'Geología',
                'Meteorología',
                'Nanotecnología',
                'Ciencias de la Computación',
                'Ingeniería Nuclear',
            ],
            'A' => [
                'Artes Visuales',
                'Diseño Gráfico',
                'Música',
                'Literatura',
                'Teatro y Actuación',
                'Diseño de Modas',
                'Arquitectura de Interiores',
                'Comunicación y Medios Digitales',
                'Cine y Producción Audiovisual',
                'Diseño Industrial',
                'Historia del Arte',
                'Coreografía',
                'Composición Musical',
                'Diseño Editorial',
            ],
            'S' => [
                'Medicina',
                'Psicología',
                'Enfermería',
                'Trabajo Social',
                'Pedagogía',
                'Educación Preescolar',
                'Terapia Física',
                'Nutrición',
                'Gerontología',
                'Relaciones Internacionales',
                'Antropología Social',
                'Sociología',
                'Ciencias de la Familia',
                'Orientación Educativa',
                'Promoción de la Salud',
            ],
            'E' => [
                'Administración de Empresas',
                'Mercadotecnia',
                'Comercio Internacional',
                'Finanzas',
                'Derecho',
                'Ciencias Políticas',
                'Relaciones Públicas',
                'Gestión Turística',
                'Desarrollo Empresarial',
                'Administración Pública',
                'Negocios Internacionales',
                'Dirección de Empresas',
                'Consultoría',
                'Gestión de Proyectos',
                'Liderazgo Organizacional',
            ],
            'C' => [
                'Contaduría Pública',
                'Administración',
                'Informática Administrativa',
                'Archivonomía',
                'Secretariado Ejecutivo',
                'Auditoría',
                'Finanzas',
                'Gestión Documental',
                'Recursos Humanos',
                'Administración de Personal',
                'Gestión de Calidad',
                'Logística',
                'Comercio Exterior',
                'Gestión Aduanera',
                'Office Management',
            ],
        ];

        // 🔁 Recorrer todas las categorías y sus carreras
        foreach ($datos as $codigo => $carreras) {
            $categoria = DB::table('categorias_riasec')->where('codigo', $codigo)->first();

            if ($categoria) {
                foreach ($carreras as $nombre) {
                    // Insertar carrera y obtener su ID
                    $idCarrera = DB::table('carreras')->insertGetId([
                        'nombre' => $nombre,
                    ]);

                    // Relacionar en tabla pivote
                    DB::table('carrera_categoria')->insert([
                        'id_carrera' => $idCarrera,
                        'id_categoria' => $categoria->id_categoria,
                    ]);
                }
            }
        }
    }
}
