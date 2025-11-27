<?php
namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Test;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;

class ReporteController extends Controller
{
public function generar($id_test)
{
    $test = Test::with('alumno', 'resultado')->findOrFail($id_test);
    $alumno = $test->alumno;
    $resultado = $test->resultado;

    if (!$resultado) {
        abort(404, 'No se encontraron resultados para este test.');
    }

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
        ->select('carreras.nombre', 'carreras.descripcion', 'categorias_riasec.nombre as categoria')
        ->distinct()
        ->get();

    $user = auth()->user();

    $pdf = PDF::loadView('reportes.certificado', [
        'test' => $test,
        'alumno' => $alumno,
        'puntos' => $puntos,
        'carreras' => $carreras,
        'topCategorias' => $topCategorias,
        'user' => $user,
        'fecha' => now()->format('d/m/Y'),
    ])->setPaper('a4', 'portrait');

    $nombreArchivo = 'reporte_' . $alumno->id_alumno . '_' . now()->format('Ymd_His') . '.pdf';
    $ruta = 'reportes/' . $nombreArchivo;

    Storage::disk('public')->put($ruta, $pdf->output());

    Reporte::create([
        'id_alumno' => $alumno->id_alumno,
        'id_test' => $test->id_test,
        'nombre_archivo' => $nombreArchivo,
        'ruta_archivo' => 'storage/' . $ruta,
    ]);

    return response()->download(storage_path('app/public/' . $ruta));
}
}
