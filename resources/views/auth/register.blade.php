<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - InspiraTec</title>
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
                            50: '#e6f7ff',
                            100: '#b3e0ff',
                            200: '#80c9ff',
                            300: '#4db3ff',
                            400: '#1a9cff',
                            500: '#0080ff',
                            600: '#0066cc',
                            700: '#004d99',
                            800: '#003366',
                            900: '#001a33',
                        },
                        valle: {
                            50: '#f0f9f0',
                            100: '#dcf2dc',
                            200: '#b8e5b8',
                            300: '#95d895',
                            400: '#71cb71',
                            500: '#4dbe4d',
                            600: '#3d983d',
                            700: '#2e722e',
                            800: '#1e4c1e',
                            900: '#0f260f',
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
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .floating-shapes {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            z-index: 0;
        }
        .shape-1 {
            width: 200px;
            height: 200px;
            background: #0080ff;
            top: 10%;
            left: 5%;
            animation: float 8s ease-in-out infinite;
        }
        .shape-2 {
            width: 150px;
            height: 150px;
            background: #4dbe4d;
            bottom: 20%;
            right: 10%;
            animation: float 10s ease-in-out infinite reverse;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        .input-focus:focus {
            border-color: #0080ff;
            box-shadow: 0 0 0 3px rgba(0, 128, 255, 0.1);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen font-sans text-gray-800 overflow-x-hidden flex items-center justify-center p-4">
    <!-- Floating Shapes -->
    <div class="floating-shapes shape-1"></div>
    <div class="floating-shapes shape-2"></div>

    <div class="max-w-4xl w-full">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center space-x-3 mb-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center shadow-lg">
                    <i class="fas fa-graduation-cap text-xl text-white"></i>
                </div>
                <h1 class="text-2xl font-bold text-white">InspiraTec</h1>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-2">Crea tu Cuenta</h2>
            <p class="text-tec-200">Comienza tu camino hacia el éxito profesional</p>
        </div>

        <!-- Form Container -->
        <div class="glass-effect rounded-2xl shadow-2xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <!-- Left Side - Form -->
                <div class="p-8">
                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <!-- Grid de nombres -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Nombre -->
                            <div>
                                <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-user text-tec-500 mr-2"></i>Nombre(s) *
                                </label>
                                <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" required autofocus
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus transition-all duration-200">
                                @error('nombre')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Apellido Paterno -->
                            <div>
                                <label for="ap" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Apellido Paterno *
                                </label>
                                <input id="ap" type="text" name="ap" value="{{ old('ap') }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus transition-all duration-200">
                                @error('ap')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Grid de apellidos y edad -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Apellido Materno -->
                            <div>
                                <label for="am" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Apellido Materno *
                                </label>
                                <input id="am" type="text" name="am" value="{{ old('am') }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus transition-all duration-200">
                                @error('am')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Edad -->
                            <div>
                                <label for="edad" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-birthday-cake text-tec-500 mr-2"></i>Edad *
                                </label>
                                <input id="edad" type="number" name="edad" value="{{ old('edad') }}" min="1" max="120" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus transition-all duration-200">
                                @error('edad')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Grid de género y nivel educativo -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Género -->
                            <div>
                                <label for="genero_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-venus-mars text-tec-500 mr-2"></i>Género *
                                </label>
                                <select id="genero_id" name="genero_id" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus transition-all duration-200">
                                    <option value="">Selecciona un género</option>
                                    @foreach($generos as $genero)
                                        <option value="{{ $genero->id }}" {{ old('genero_id') == $genero->id ? 'selected' : '' }}>
                                            {{ $genero->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('genero_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nivel Educativo -->
                            <div>
                                <label for="nivel_educativo_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-graduation-cap text-tec-500 mr-2"></i>Nivel Educativo *
                                </label>
                                <select id="nivel_educativo_id" name="nivel_educativo_id" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus transition-all duration-200">
                                    <option value="">Selecciona un nivel</option>
                                    @foreach($nivelesEducativos as $nivel)
                                        <option value="{{ $nivel->id }}" {{ old('nivel_educativo_id') == $nivel->id ? 'selected' : '' }}>
                                            {{ $nivel->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nivel_educativo_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Intereses -->
                        <div>
                            <label for="intereses" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-heart text-tec-500 mr-2"></i>Intereses *
                            </label>
                            <textarea id="intereses" name="intereses" rows="3" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus transition-all duration-200 resize-none"
                                      placeholder="Describe tus intereses, hobbies, actividades que disfrutas...">{{ old('intereses') }}</textarea>
                            @error('intereses')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope text-tec-500 mr-2"></i>Correo Electrónico *
                            </label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus transition-all duration-200"
                                   placeholder="tu@email.com">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Grid de contraseñas -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Contraseña -->
                            <div>
                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-lock text-tec-500 mr-2"></i>Contraseña *
                                </label>
                                <input id="password" type="password" name="password" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus transition-all duration-200"
                                       placeholder="Mínimo 8 caracteres">
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirmar Contraseña -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-lock text-tec-500 mr-2"></i>Confirmar Contraseña *
                                </label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus transition-all duration-200"
                                       placeholder="Repite tu contraseña">
                            </div>
                        </div>

                        <!-- Botón de registro -->
                        <button type="submit"
                                class="w-full bg-gradient-to-r from-tec-600 to-valle-600 hover:from-tec-700 hover:to-valle-700 text-white font-bold py-4 px-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-user-plus mr-2"></i>Registrar Cuenta
                        </button>
                    </form>

                    <!-- Enlace a login -->
                    <div class="mt-6 text-center">
                        <p class="text-gray-600">
                            ¿Ya tienes cuenta?
                            <a href="{{ route('login') }}" class="text-tec-600 hover:text-tec-700 font-semibold transition-colors duration-200">
                                Inicia Sesión
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Right Side - Info -->
                <div class="bg-gradient-to-br from-tec-600 to-valle-600 p-8 text-white flex flex-col justify-center">
                    <div class="text-center">
                        <div class="w-20 h-20 rounded-2xl bg-white/20 flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-compass text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Descubre tu Vocación</h3>
                        <p class="text-tec-100 mb-6 leading-relaxed text-justify">
                            Al registrarte podrás acceder a nuestro test vocacional basado en el modelo RIASEC y descubrir carreras que se adapten a tu personalidad.
                        </p>

                        <div class="space-y-3 text-left">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-valle-300 mr-3"></i>
                                <span>Test vocacional personalizado</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-valle-300 mr-3"></i>
                                <span>Resultados detallados</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-valle-300 mr-3"></i>
                                <span>Recomendaciones de carreras</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-valle-300 mr-3"></i>
                                <span>Seguimiento de progreso</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Efecto de focus mejorado para inputs
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input, select, textarea');

            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-tec-500', 'ring-opacity-20');
                });

                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-tec-500', 'ring-opacity-20');
                });
            });
        });
    </script>
</body>
</html>
