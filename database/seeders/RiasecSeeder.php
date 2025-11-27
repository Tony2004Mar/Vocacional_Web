<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RiasecSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        // Categorías
        $cats = [
            ['codigo'=>'R','nombre'=>'Realista','descripcion'=>'Actividades manuales, técnicas y prácticas.'],
            ['codigo'=>'I','nombre'=>'Investigador','descripcion'=>'Actividades analíticas y científicas.'],
            ['codigo'=>'A','nombre'=>'Artístico','descripcion'=>'Actividades creativas y expresivas.'],
            ['codigo'=>'S','nombre'=>'Social','descripcion'=>'Actividades de ayuda y enseñanza.'],
            ['codigo'=>'E','nombre'=>'Emprendedor','descripcion'=>'Liderazgo, ventas y persuasión.'],
            ['codigo'=>'C','nombre'=>'Convencional','descripcion'=>'Organización, procedimientos y oficinas.'],
        ];

        foreach($cats as $c) DB::table('categorias_riasec')->insert(array_merge($c,['created_at'=>$now,'updated_at'=>$now]));

        // Se asume que existe un admin con id_user = 1 y se creó Administradores
        $adminId = DB::table('administradores')->value('id_admin');
        if (!$adminId) {
            // si no existe, se crea un registro temporal enlazado al primer usuario
            $userId = DB::table('users')->value('id') ?? 1;
            $adminId = DB::table('administradores')->insertGetId([
                'id_user' => $userId,
                'created_at'=>$now,'updated_at'=>$now
            ]);
        }

        // Preguntas (42) con asignación de categoría.
        // Orden/Texto tal como me diste: cada pregunta con categoría
        $preguntas = [
            // REALISTA (7)
            ['R','Me gusta trabajar en coches'],
            ['R','Me gusta construir cosas'],
            ['R','Me gusta cuidar animales'],
            ['R','Me gusta juntar cosas o ensamblar cosas'],
            ['R','Me gusta cocinar'],
            ['R','Soy una persona práctica'],
            ['R','Me gusta trabajar al aire libre'],

            // INVESTIGADOR (7)
            ['I','Me gusta hacer rompecabezas'],
            ['I','Soy bueno trabajando de forma independiente'],
            ['I','Me gusta hacer experimentos'],
            ['I','Disfruto de la ciencia'],
            ['I','Disfruto intentando averiguar cómo funcionan las cosas'],
            ['I','Me gusta analizar las cosas (problemas/situaciones)'],
            ['I','Me gusta trabajar con números o gráficos'],


            // ARTÍSTICA (7)
            ['A','Soy bueno en matemáticas'],
            ['A','Me gusta leer sobre arte y música'],
            ['A','Disfruto de la escritura creativa'],
            ['A','Soy una persona creativa'],
            ['A','Me gusta tocar instrumentos o cantar'],
            ['A','Me gusta actuar en obras de teatro'],
            ['A','Me gusta dibujar'],

            // SOCIAL (7)
            ['S','Me gusta trabajar en equipo'],
            ['S','Me gusta enseñar o entrenar a la gente'],
            ['S','Me gusta intentar ayudar a las personas a resolver sus problemas'],
            ['S','Me interesa curar a las personas'],
            ['S','Disfruto aprendiendo sobre otras culturas'],
            ['S','Me gusta entrar en discusiones sobre temas'],
            ['S','Me gusta ayudar a la gente'],



            // EMPRENDEDORA (7)
            ['E','Me interesa participar en actividades comunitarias'],
            ['E','Soy una persona ambiciosa, me pongo metas'],
            ['E','Me gusta intentar influir o persuadir a la gente'],
            ['E','Me gusta vender cosas'],
            ['E','Soy rápido para asumir nuevas responsabilidades'],
            ['E','Me gustaría empezar mi propio negocio'],
            ['E','Me gusta liderar'],


            // CONVENCIONAL (7)
            ['C','Me gusta dar discursos'],
            ['C','Me gusta organizar cosas (archivos, escritorios/oficinas)'],
            ['C','Me gusta tener instrucciones claras a seguir'],
            ['C','No me importaría trabajar 8 horas al día en una oficina'],
            ['C','Presto atención a los detalles'],
            ['C','Me gusta archivar o escribir a máquina'],
            ['C','Soy bueno manteniendo registros de mi trabajo'],

        ];


        foreach ($preguntas as $p) {
            $catId = DB::table('categorias_riasec')->where('codigo',$p[0])->value('id_categoria');
            DB::table('preguntas')->insert([
                'id_admin' => $adminId,
                'id_categoria' => $catId,
                'descripcion' => $p[1],
                'created_at'=>$now,
                'updated_at'=>$now
            ]);
        }
    }
}
