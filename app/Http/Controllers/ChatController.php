<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GroqService;
use App\Models\Test;
use App\Models\Pregunta;

class ChatController extends Controller
{
    protected GroqService $groq;

    public function __construct(GroqService $groq)
    {
        $this->middleware(['auth', 'rol:estudiante']);
        $this->groq = $groq;
    }

    /**
     * Endpoint AJAX que recibe la pregunta del alumno
     * y consulta a Groq con búsqueda web.
     */
    public function preguntar(Request $request)
    {
        $request->validate([
            'carrera'  => 'required|string|max:255',
            'pregunta' => 'required|string|max:500',
            'test_id'  => 'nullable|integer',
        ]);

        $carrera  = $request->input('carrera');
        $pregunta = $request->input('pregunta');
        $testId   = $request->input('test_id');

        // Construir contexto del alumno (perfil RIASEC)
        $contextoAlumno = [];
        if ($testId) {
            $test = Test::with('resultado')->where('id_test', $testId)
                ->whereHas('alumno', function ($q) {
                    $q->where('user_id', auth()->id());
                })
                ->first();

            if ($test && $test->resultado) {
                $resultado = $test->resultado;
                $puntos = [
                    'R' => $resultado->puntos_R ?? 0,
                    'I' => $resultado->puntos_I ?? 0,
                    'A' => $resultado->puntos_A ?? 0,
                    'S' => $resultado->puntos_S ?? 0,
                    'E' => $resultado->puntos_E ?? 0,
                    'C' => $resultado->puntos_C ?? 0,
                ];
                arsort($puntos);
                $topLetras = array_slice(array_keys($puntos), 0, 3);

                $nombres = [
                    'R' => 'Realista', 'I' => 'Investigador',
                    'A' => 'Artístico', 'S' => 'Social',
                    'E' => 'Emprendedor', 'C' => 'Convencional',
                ];

                $contextoAlumno = [
                    'puntos' => $puntos,
                    'perfil' => implode(' + ', array_map(fn($l) => $nombres[$l] ?? $l, $topLetras)),
                ];
            }
        }

       $resultado = $this->groq->preguntarSobreCarrera($carrera, $pregunta, $contextoAlumno);

        return response()->json($resultado);
    }
}