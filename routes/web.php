<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    return $user->rol === 'administrador'
        ? redirect()->route('admin.home')
        : redirect()->route('estudiante.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::middleware('rol:administrador')->group(function () {
        Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');

    });


    Route::middleware('rol:estudiante')->group(function () {
        Route::get('/estudiante/home', [EstudianteController::class, 'index'])->name('estudiante.home');

    });
});

use App\Http\Controllers\TestController;
use App\Http\Controllers\ChatController;

Route::middleware(['auth', 'rol:estudiante'])->group(function () {
    Route::get('/alumno', [TestController::class, 'index'])->name('alumno.dashboard');
    Route::post('/test/start', [TestController::class, 'start'])->name('test.start');
    Route::get('/test/{test}/question/{index}', [TestController::class, 'showQuestion'])->name('test.question');
    Route::post('/test/{test}/answer', [TestController::class, 'answer'])->name('test.answer');

    Route::post('/test/{test}/answer-batch', [TestController::class, 'answerBatch'])->name('test.answerBatch');
    Route::post('/test/{test}/answer-single', [TestController::class, 'answerSingle'])->name('test.answerSingle');
    Route::get('/test/{test}/answers', [TestController::class, 'getAnswers'])->name('test.answers');
    Route::get('/test/history', [TestController::class, 'history'])->name('test.history');
    Route::get('/test/{test}/result', [TestController::class, 'showResult'])->name('test.result');
    Route::delete('/test/{test}', [TestController::class, 'eliminarTest'])->name('test.eliminar');
    Route::post('/chat/carrera', [ChatController::class, 'preguntar'])
    ->name('chat.carrera');
});



Route::post('/test/{test}/answer-batch', [TestController::class, 'answerBatch'])
    ->name('test.answerBatch');

Route::get('/test/{test}/result', [TestController::class, 'showResult'])
     ->name('test.result')
     ->middleware(['auth','rol:estudiante']);
Route::delete('/test/{test}/eliminar', [TestController::class, 'eliminarTest'])
         ->name('test.eliminar')
         ->middleware(['auth', 'rol:estudiante']);

use App\Http\Controllers\ReporteController;

Route::middleware(['auth'])->group(function () {
 Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
 Route::get('/reportes/generar/{id_test}', [ReporteController::class, 'generar'])->name('reportes.generar');
 Route::get('/reportes/descargar/{id_reporte}', [ReporteController::class, 'descargar'])->name('reportes.descargar');
});
// Descarga de reporte individual (solo para tests completados)
Route::get('/reporte/test/{id_test}', [ReporteController::class, 'generar'])->name('reporte.generar');

require __DIR__.'/auth.php';
