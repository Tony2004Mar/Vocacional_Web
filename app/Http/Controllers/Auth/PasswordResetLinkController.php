<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Traducciones al español
        $spanishMessages = [
            Password::RESET_LINK_SENT => 'Te hemos enviado por correo electrónico el enlace para restablecer tu contraseña.',
            Password::INVALID_USER => 'No podemos encontrar un usuario con esa dirección de correo electrónico.',
            Password::RESET_THROTTLED => 'Por favor espera antes de intentar nuevamente.',
        ];

        $message = $spanishMessages[$status] ?? __($status);

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', $message)
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => $message]);
    }
}
