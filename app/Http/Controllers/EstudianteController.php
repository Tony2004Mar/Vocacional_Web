<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Alumno;
use App\Models\Estado;

class EstudianteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','rol:estudiante']);
    }

    public function index()
    {
        $user = auth()->user();
        $alumno = Alumno::where('user_id', $user->id)->first();

        if (!$alumno) {
            $alumno = Alumno::create(['user_id' => $user->id]);
        }

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
}


