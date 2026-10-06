<?php
namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Test;
use App\Models\Alumno;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;

class ReporteController extends Controller
{
    /**
     * Generar reporte para un test específico
     */
    public function generar($id_test)
    {
        $test = Test::with('alumno', 'resultado')->findOrFail($id_test);
        $alumno = $test->alumno;
        $resultado = $test->resultado;

        if (!$resultado) {
            abort(404, 'No se encontraron resultados para este test.');
        }

        // Preparar datos
        $datos = $this->prepararDatosReporte($test, $alumno, $resultado);
        
        // Generar PDF
        $pdf = $this->generarPDF($datos);
        
        // Guardar y descargar
        return $this->guardarYDescargar($pdf, $alumno, $test);
    }

    /**
     * Generar reporte con TODOS los tests completados del usuario
     */
    public function generarTodos($id_alumno)
    {
        $alumno = Alumno::with(['tests.resultado'])->findOrFail($id_alumno);
        
        // Obtener solo tests completados exitosamente
        $testsCompletados = $alumno->tests->filter(function($test) {
            return $test->estado === 'completado' && $test->resultado !== null;
        });

        if ($testsCompletados->isEmpty()) {
            abort(404, 'No se encontraron tests completados para este alumno.');
        }

        // Preparar datos para el reporte compuesto
        $datosCompuestos = [];
        foreach ($testsCompletados as $test) {
            $datosCompuestos[] = $this->prepararDatosReporte($test, $alumno, $test->resultado);
        }

        // Generar PDF con todos los reportes
        $pdf = $this->generarPDFMultiple($datosCompuestos, $alumno);
        
        // Guardar y descargar
        $nombreArchivo = 'reporte_completo_' . $alumno->id_alumno . '_' . now()->format('Ymd_His') . '.pdf';
        $ruta = 'reportes/' . $nombreArchivo;
        
        Storage::disk('public')->put($ruta, $pdf->output());
        
        // Guardar registro en BD
        Reporte::create([
            'id_alumno' => $alumno->id_alumno,
            'id_test' => null, // Reporte compuesto
            'nombre_archivo' => $nombreArchivo,
            'ruta_archivo' => 'storage/' . $ruta,
        ]);

        return response()->download(storage_path('app/public/' . $ruta));
    }

    /**
     * Preparar datos para un reporte individual
     */
    private function prepararDatosReporte($test, $alumno, $resultado)
    {
        $puntos = [
            'R' => (int) $resultado->puntos_R,
            'I' => (int) $resultado->puntos_I,
            'A' => (int) $resultado->puntos_A,
            'S' => (int) $resultado->puntos_S,
            'E' => (int) $resultado->puntos_E,
            'C' => (int) $resultado->puntos_C,
        ];

        // Ordenar para obtener el top 3
        $puntosOrdenados = $puntos;
        arsort($puntosOrdenados);
        $topCodigos = array_slice(array_keys($puntosOrdenados), 0, 3);

        $nombresCategorias = [
            'R' => 'Realista',
            'I' => 'Investigador',
            'A' => 'Artístico',
            'S' => 'Social',
            'E' => 'Emprendedor',
            'C' => 'Convencional'
        ];

        $topNombres = array_map(function($codigo) use ($nombresCategorias) {
            return $nombresCategorias[$codigo] ?? $codigo;
        }, $topCodigos);

        // Obtener carreras recomendadas
        $carreras = DB::table('carreras')
            ->join('carrera_categoria', 'carreras.id_carrera', '=', 'carrera_categoria.id_carrera')
            ->join('categorias_riasec', 'carrera_categoria.id_categoria', '=', 'categorias_riasec.id_categoria')
            ->whereIn('categorias_riasec.codigo', $topCodigos)
            ->select('carreras.nombre', 'carreras.descripcion', 'categorias_riasec.nombre as categoria', 'categorias_riasec.codigo')
            ->distinct()
            ->get();

        $user = auth()->user();

        return [
            'test' => $test,
            'alumno' => $alumno,
            'puntos' => $puntos,
            'carreras' => $carreras,
            'topCategorias' => $topNombres,
            'topCodigos' => $topCodigos,
            'user' => $user,
            'fecha' => now()->format('d/m/Y'),
            'nombresCategorias' => $nombresCategorias,
            'fecha_test' => $test->fecha_realizacion ? Carbon::parse($test->fecha_realizacion)->format('d/m/Y H:i') : 'N/A',
        ];
    }

    /**
     * Generar PDF individual
     */
    private function generarPDF($datos)
    {
        $pdf = PDF::loadView('reportes.certificado', $datos);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOptions([
            'dpi' => 150,
            'defaultFont' => 'dejavu sans',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'isPhpEnabled' => true,
            'isFontSubsettingEnabled' => true,
            'pdfBackend' => 'CPDF',
            'isJavascriptEnabled' => false,
        ]);
        return $pdf;
    }

    /**
     * Generar PDF con múltiples reportes
     */
    private function generarPDFMultiple($datosCompuestos, $alumno)
    {
        $pdf = PDF::loadView('reportes.certificado_multiple', [
            'alumno' => $alumno,
            'reportes' => $datosCompuestos,
            'totalTests' => count($datosCompuestos),
            'fecha' => now()->format('d/m/Y'),
            'user' => auth()->user(),
        ]);
        
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOptions([
            'dpi' => 150,
            'defaultFont' => 'dejavu sans',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'isPhpEnabled' => true,
            'isFontSubsettingEnabled' => true,
            'pdfBackend' => 'CPDF',
            'isJavascriptEnabled' => false,
        ]);
        return $pdf;
    }

    /**
     * Guardar y descargar PDF
     */
    private function guardarYDescargar($pdf, $alumno, $test)
    {
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