<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - InspiraTec</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        tec: {
                            500: '#0080ff',
                            600: '#0066cc',
                            700: '#004d99',
                        },
                        valle: {
                            500: '#4dbe4d',
                            600: '#3d983d',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #001a33 0%, #003366 50%, #0080ff 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen font-sans text-gray-800 overflow-x-hidden flex items-center justify-center p-4">
    <div class="max-w-4xl w-full">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center space-x-3 mb-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center shadow-lg">
                    <i class="fas fa-graduation-cap text-xl text-white"></i>
                </div>
                <h1 class="text-2xl font-bold text-white">InspiraTec</h1>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-2">Bienvenido de Nuevo</h2>
            <p class="text-blue-200">Continúa tu camino hacia el éxito profesional</p>
        </div>

        <!-- Form Container -->
        <div class="glass-effect rounded-2xl shadow-2xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <!-- Left Side - Form -->
                <div class="p-8">
                    <!-- Mensaje de éxito después del registro -->
                    @if(session('status'))
                    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-center">
                        <i class="fas fa-check-circle mr-3 text-green-500"></i>
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- Session Status -->
                    @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-center">
                        <i class="fas fa-check-circle mr-3 text-green-500"></i>
                        {{ session('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope text-tec-500 mr-2"></i>Correo Electrónico *
                            </label>
                            <input id="email"
                                   type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus
                                   autocomplete="username"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-tec-500 focus:ring-2 focus:ring-tec-500 focus:ring-opacity-20 transition-all duration-200"
                                   placeholder="tu@email.com">
                            @error('email')
                                <div class="mt-2 flex items-center text-red-500 text-sm">
                                    <i class="fas fa-exclamation-circle mr-2"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-lock text-tec-500 mr-2"></i>Contraseña *
                            </label>
                            <input id="password"
                                   type="password"
                                   name="password"
                                   required
                                   autocomplete="current-password"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-tec-500 focus:ring-2 focus:ring-tec-500 focus:ring-opacity-20 transition-all duration-200"
                                   placeholder="Ingresa tu contraseña">
                            @error('password')
                                <div class="mt-2 flex items-center text-red-500 text-sm">
                                    <i class="fas fa-exclamation-circle mr-2"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                                <input id="remember_me"
                                       type="checkbox"
                                       name="remember"
                                       class="w-4 h-4 text-tec-600 border-gray-300 rounded focus:ring-tec-500">
                                <span class="ms-2 text-sm text-gray-600">Recordar sesión</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                   class="text-sm text-tec-600 hover:text-tec-700 font-medium transition-colors duration-200">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                                class="w-full bg-gradient-to-r from-tec-500 to-valle-500 hover:from-tec-600 hover:to-valle-600 text-white font-bold py-4 px-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                        </button>

                        <!-- Register Link -->
                        <div class="text-center pt-6 border-t border-gray-200">
                            <p class="text-gray-600">
                                ¿No tienes una cuenta?
                                <a href="{{ route('register') }}"
                                   class="text-tec-600 hover:text-tec-700 font-semibold transition-colors duration-200 ml-1">
                                    Regístrate aquí
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Right Side - Info -->
                <div class="bg-gradient-to-br from-tec-500 to-valle-500 p-8 text-white flex flex-col justify-center">
                    <div class="text-center">
                        <div class="w-20 h-20 rounded-2xl bg-white/20 flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-rocket text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Continúa tu Viaje</h3>
                        <p class="text-blue-100 mb-6 leading-relaxed">
                            Accede a tu perfil vocacional, revisa tus resultados y descubre nuevas oportunidades profesionales.
                        </p>

                        <div class="space-y-4 text-left">
                            <div class="flex items-start">
                                <i class="fas fa-chart-line text-green-300 mr-3 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold">Progreso Personalizado</h4>
                                    <p class="text-blue-100 text-sm">Sigue tu desarrollo profesional</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-gem text-green-300 mr-3 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold">Resultados Exclusivos</h4>
                                    <p class="text-blue-100 text-sm">Accede a tu perfil RIASEC completo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
