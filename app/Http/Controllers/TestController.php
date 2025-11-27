<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Pregunta;
use App\Models\Resultado;
use App\Models\Estado;
use App\Models\Alumno;
use Carbon\Carbon;
use DB;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','rol:estudiante']);
    }

    public function index()
    {
        $alumno = Alumno::firstOrCreate(['user_id' => $user->id]);

        $alumno->load(['tests.resultado']);

       $test = Test::where('id_alumno', $alumno->id_alumno)
           ->whereHas('estado', function ($query) {
               $query->where('nombre', '!=', 'finalizado');
           })
           ->with(['resultado', 'estado'])
           ->latest()
           ->first();


        return view('alumno.home', compact('alumno', 'test'));
    }

   public function start()
   {
       $user = auth()->user();
       $alumno = Alumno::firstOrCreate(['user_id' => $user->id]);

       $estado = Estado::where('nombre', 'en_progreso')->first();

       if (!$estado) {
           $estado = Estado::create(['nombre' => 'en_progreso']);
       }

       $test = Test::create([
           'id_alumno' => $alumno->id_alumno,
           'id_estado' => $estado->id_estado,
           'fecha_inicio' => Carbon::now(),
       ]);

       Resultado::create([
           'id_test' => $test->id_test,
       ]);

       return redirect()->route('test.question', [
           'test' => $test->id_test,
           'index' => 0
       ]);
   }

    public function showQuestion(Test $test, $index)
    {
        $preguntas = Pregunta::with('categoria')->get();
        $total = $preguntas->count();

        if ($index >= $total) {
            return $this->finish($test);
        }

        $pregunta = $preguntas[$index];
        return view('alumno.question', compact('test', 'pregunta', 'index', 'total'));
    }

    public function answer(Request $request, Test $test)
    {
        $request->validate([
            'id_pregunta' => 'required|integer',
            'respuesta' => 'required|in:si,no',
            'index' => 'required|integer'
        ]);

        $pregunta = Pregunta::with('categoria')->findOrFail($request->id_pregunta);
        $codigo = $pregunta->categoria->codigo;

        $resultado = Resultado::where('id_test', $test->id_test)->first();

        if ($request->respuesta === 'si') {
            $resultado = Resultado::where('id_test', $test->id_test)->first();
            if ($resultado) {
                $columna = "puntos_{$codigo}";
                $resultado->increment($columna);
            }
        }
        $test->update(['id_pregunta_actual' => $request->id_pregunta]);

        $nextIndex = $request->index + 1;
        $total = Pregunta::count();

        if ($nextIndex >= $total) {
            return $this->finish($test);
        }

        return redirect()->route('test.question', ['test' => $test->id_test, 'index' => $nextIndex]);
    }

    public function history()
    {
        $user = auth()->user();
        $alumno = Alumno::where('user_id', $user->id)->first();

      $tests = $alumno
          ? Test::with(['estado', 'resultado'])->where('id_alumno', $alumno->id_alumno)->orderByDesc('created_at')->get()
          : collect();

        return view('alumno.history', compact('tests'));
    }

    public function eliminarTest(Test $test)
    {
        try {
            $user = auth()->user();
            $alumno = Alumno::where('user_id', $user->id)->first();

            if ($test->id_alumno !== $alumno->id_alumno) {
                return response()->json(['success' => false, 'message' => 'No tienes permisos para eliminar este test'], 403);
            }

            DB::beginTransaction();
            Resultado::where('id_test', $test->id_test)->delete();
            $test->delete();
            DB::commit();

            $stats = $this->calcularEstadisticas($alumno->id_alumno);
            return response()->json(['success' => true, 'message' => 'Test eliminado correctamente', 'stats' => $stats]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Error al eliminar el test: '.$e->getMessage()], 500);
        }
    }

    private function calcularEstadisticas($idAlumno)
    {
        $tests = Test::with('estado')->where('id_alumno', $idAlumno)->get();

           return [
               'completados' => $tests->filter(fn($t) => $t->estado && $t->estado->nombre === 'finalizado')->count(),
               'en_progreso' => $tests->filter(fn($t) => $t->estado && $t->estado->nombre === 'en_progreso')->count(),
               'total' => $tests->count(),
               'dias_seguimiento' => $tests->min('fecha_inicio') ? now()->diffInDays($tests->min('fecha_inicio')) : 0
           ];
    }

    public function showResult(Test $test)
    {
        $resultado = $test->resultado;
        if (!$resultado) abort(404, "Resultado no encontrado");

        $puntos = [
            'R' => $resultado->puntos_R,
            'I' => $resultado->puntos_I,
            'A' => $resultado->puntos_A,
            'S' => $resultado->puntos_S,
            'E' => $resultado->puntos_E,
            'C' => $resultado->puntos_C,
        ];

        arsort($puntos);
        $topCategorias = array_slice(array_keys($puntos), 0, 3);

        $carreras = DB::table('carreras')
            ->join('carrera_categoria', 'carreras.id_carrera', '=', 'carrera_categoria.id_carrera')
            ->join('categorias_riasec', 'carrera_categoria.id_categoria', '=', 'categorias_riasec.id_categoria')
            ->whereIn('categorias_riasec.codigo', $topCategorias)
            ->select('carreras.*', 'categorias_riasec.codigo as cat_codigo')
            ->distinct()
            ->get();

        return view('alumno.results', compact('test', 'puntos', 'topCategorias', 'carreras'));
    }

    protected function finish(Test $test)
    {
       $estadoFinalizado = Estado::where('nombre', 'finalizado')->first();

       if (!$estadoFinalizado) {
           $estadoFinalizado = Estado::create(['nombre' => 'finalizado']);
       }

       $test->update([
           'fecha_finalizacion' => Carbon::now(),
           'id_estado' => $estadoFinalizado->id_estado
       ]);


        $resultado = Resultado::where('id_test', $test->id_test)->first();
        if (!$resultado) abort(404, 'Resultado no encontrado');

        $puntos = [
            'R' => $resultado->puntos_R,
            'I' => $resultado->puntos_I,
            'A' => $resultado->puntos_A,
            'S' => $resultado->puntos_S,
            'E' => $resultado->puntos_E,
            'C' => $resultado->puntos_C,
        ];

        arsort($puntos);
        $topCategorias = array_slice(array_keys($puntos), 0, 3);

        $carreras = DB::table('carreras')
            ->join('carrera_categoria', 'carreras.id_carrera', '=', 'carrera_categoria.id_carrera')
            ->join('categorias_riasec', 'carrera_categoria.id_categoria', '=', 'categorias_riasec.id_categoria')
            ->whereIn('categorias_riasec.codigo', $topCategorias)
            ->select('carreras.*', 'categorias_riasec.codigo as cat_codigo')
            ->distinct()
            ->get();

        return view('alumno.results', compact('test', 'puntos', 'carreras', 'topCategorias'));
    }
}

