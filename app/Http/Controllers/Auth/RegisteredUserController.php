<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Genero;
use App\Models\NivelEducativo;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        $generos = Genero::all();
        $nivelesEducativos = NivelEducativo::all();

        return view('auth.register', compact('generos', 'nivelesEducativos'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'ap' => ['required', 'string', 'max:255'],
            'am' => ['required', 'string', 'max:255'],
            'edad' => ['required', 'integer', 'min:1', 'max:120'],
            'genero_id' => ['required', 'exists:generos,id'],
            'nivel_educativo_id' => ['required', 'exists:niveles_educativos,id'],
            'intereses' => ['required', 'string', 'max:1000'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'ap' => $request->ap,
            'am' => $request->am,
            'edad' => $request->edad,
            'genero_id' => $request->genero_id,
            'nivel_educativo_id' => $request->nivel_educativo_id,
            'intereses' => $request->intereses,
            'email' => $request->email,
            'rol' => 'estudiante',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('status', '¡Registro exitoso! Por favor inicia sesión.');
    }

    protected function redirectTo()
    {
        $role = Auth::user()->role;

        if ($role === 'estudiante') {
            return '/dashboard_estudiante';
        }

        if ($role === 'administrador') {
            return '/dashboard_administrador';
        }
    }
}
