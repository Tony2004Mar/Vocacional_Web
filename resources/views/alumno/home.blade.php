<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - InspiraTec</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s ease-out',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
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
            background: rgba(255, 255, 255, 0.1);
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
        .hero-card {
            background: linear-gradient(135deg, rgba(0, 128, 255, 0.2) 0%, rgba(77, 190, 77, 0.2) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .btn-primary {
            background: linear-gradient(135deg, #0080ff 0%, #4dbe4d 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 128, 255, 0.3);
        }
        .stat-card {
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen font-sans text-white overflow-x-hidden">
    <!-- Floating Shapes -->
    <div class="floating-shapes shape-1"></div>
    <div class="floating-shapes shape-2"></div>

    <!-- Header -->
    <header class="relative z-10">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3 animate-fade-in-up">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center shadow-lg">
                        <i class="fas fa-graduation-cap text-xl text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">InspiraTec</h1>
                        <p class="text-xs text-tec-200">TESVB Valle de Bravo</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="hidden md:flex items-center space-x-2 glass-effect px-4 py-2 rounded-full">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center shadow-md">
                            <span class="text-white font-bold text-sm">{{ substr(auth()->user()->nombre ?? auth()->user()->name, 0, 1) }}</span>
                        </div>
                        <span class="font-medium">{{ auth()->user()->nombre ?? auth()->user()->name }}</span>
                    </div>

                <div class="hidden md:flex items-center space-x-2 glass-effect px-4 py-2 rounded-full">
                   <div class="w-8 h-8 rounded-full bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center shadow-md">
                      <span class="text-white font-bold text-sm">{{ substr(auth()->user()->Perfil ?? auth()->user()->name, 0, 1) }}</span>
                             </div>
                              <span class="font-medium">{{ auth()->user()->nombre ?? auth()->user()->name }}</span>
                </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600/80 hover:bg-red-700 rounded-lg transition-all duration-300 backdrop-blur-sm">
                            <i class="fas fa-sign-out-alt mr-2"></i>Salir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 relative z-10">
        <!-- Hero Welcome Section -->
        <div class="hero-card rounded-3xl p-8 mb-8 animate-fade-in-up">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="text-center lg:text-left mb-6 lg:mb-0">
                    <h2 class="text-4xl md:text-5xl font-extrabold mb-4">
                        ¡Bienvenido,
                        <span class="bg-gradient-to-r from-tec-400 to-valle-400 bg-clip-text text-transparent">
                            {{ auth()->user()->nombre ?? auth()->user()->name }}
                        </span>!
                    </h2>
                    <p class="text-xl text-tec-100 max-w-2xl">
                        Descubre tu verdadera vocación profesional con nuestro test basado en el modelo RIASEC
                    </p>
                </div>
                <div class="flex space-x-4">
                    <div class="text-center">
                        <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center mb-2">
                            <i class="fas fa-rocket text-2xl text-valle-300"></i>
                        </div>
                        <span class="text-sm text-tec-200">Test Vocacional</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Test Status -->
            <div class="lg:col-span-2">
                @if($test && $test->estado == 'en_proceso')
                <!-- Test in Progress -->
                <div class="glass-effect rounded-2xl p-8 mb-6">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-bold mb-2 flex items-center">
                                <i class="fas fa-play-circle text-valle-400 mr-3"></i>
                                Test en Progreso
                            </h3>
                            <p class="text-tec-200">Continúa donde lo dejaste</p>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-tec-200">Iniciado el</div>
                            <div class="font-semibold">{{ \Carbon\Carbon::parse($test->fecha_inicio)->format('d/m/Y') }}</div>
                        </div>
                    </div>
                   @php
                       $totalPreguntas = \App\Models\Pregunta::count();
                       $respuestasContestadas = $test->pregunta_actual ?? 0;
                       $porcentajeProgreso = round(($respuestasContestadas / $totalPreguntas) * 100);
                   @endphp

                    <div class="bg-tec-800/50 rounded-xl p-6 mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="font-semibold">Progreso del Test</span>
                            <span class="text-valle-300 font-bold">{{ $porcentajeProgreso }}%</span>
                        </div>
                        <div class="w-full bg-tec-700 rounded-full h-3">
                            <div class="bg-gradient-to-r from-tec-500 to-valle-500 h-3 rounded-full" style="width: {{ $porcentajeProgreso }}%"></div>
                        </div>
                        <div class="text-center text-sm text-tec-300 mt-2">
                            {{ $respuestasContestadas }} de {{ $totalPreguntas }} preguntas respondidas
                        </div>
                    </div>

                    <a href="{{ route('test.question', ['test'=>$test->id_test, 'index'=>$respuestasContestadas]) }}"
                       class="btn-primary w-full text-center py-4 rounded-xl font-bold text-lg shadow-2xl block">
                        <i class="fas fa-play mr-2"></i>Continuar Test Vocacional
                    </a>
                </div>
                @else
                <!-- Start New Test -->
                <div class="glass-effect rounded-2xl p-8 mb-6">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 rounded-2xl bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-brain text-3xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Test Vocacional RIASEC</h3>
                        <p class="text-tec-200">42 preguntas • 15-20 minutos</p>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        <div class="text-center p-4 rounded-xl bg-white/5">
                            <div class="text-2xl font-bold text-valle-400">42</div>
                            <div class="text-xs text-tec-200">Preguntas</div>
                        </div>
                        <div class="text-center p-4 rounded-xl bg-white/5">
                            <div class="text-2xl font-bold text-tec-400">6</div>
                            <div class="text-xs text-tec-200">Dimensiones</div>
                        </div>
                        <div class="text-center p-4 rounded-xl bg-white/5">
                            <div class="text-2xl font-bold text-valle-400">15-20</div>
                            <div class="text-xs text-tec-200">Minutos</div>
                        </div>
                        <div class="text-center p-4 rounded-xl bg-white/5">
                            <div class="text-2xl font-bold text-tec-400">100%</div>
                            <div class="text-xs text-tec-200">Científico</div>
                        </div>
                    </div>

                    <form action="{{ route('test.start') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="btn-primary w-full py-4 rounded-xl font-bold text-lg shadow-2xl hover:scale-105 transition-transform duration-300">
                            <i class="fas fa-play-circle mr-2"></i>Iniciar Test Vocacional
                        </button>
                    </form>
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @php
                       $testsCompletados = $alumno->tests->filter(fn($test) => $test->estado && $test->estado->nombre === 'finalizado')->count();
                        $testsTotales = $alumno->tests->count();

                       $ultimoResultado = $alumno->tests
                         ->filter(fn($test) => $test->estado && $test->estado->nombre === 'finalizado')
                         ->sortByDesc('fecha_finalizacion')
                         ->first();
                        $puntuacionMaxima = $ultimoResultado ? max([
                            $ultimoResultado->resultado->puntos_R ?? 0,
                            $ultimoResultado->resultado->puntos_I ?? 0,
                            $ultimoResultado->resultado->puntos_A ?? 0,
                            $ultimoResultado->resultado->puntos_S ?? 0,
                            $ultimoResultado->resultado->puntos_E ?? 0,
                            $ultimoResultado->resultado->puntos_C ?? 0
                        ]) : 0;
                    @endphp



                    <div class="stat-card glass-effect rounded-2xl p-6 text-center">
                        <div class="w-12 h-12 rounded-xl bg-tec-500/20 flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-check-circle text-tec-400"></i>
                        </div>
                        <h4 class="font-bold mb-1">Tests Completados</h4>
                        <p class="text-2xl font-extrabold text-valle-400">{{ $testsCompletados }}</p>
                        <p class="text-xs text-tec-200 mt-1">de {{ $testsTotales }} totales</p>
                    </div>

                    <div class="stat-card glass-effect rounded-2xl p-6 text-center">
                        <div class="w-12 h-12 rounded-xl bg-valle-500/20 flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-chart-bar text-valle-400"></i>
                        </div>
                        <h4 class="font-bold mb-1">Puntuación Máxima</h4>
                        <p class="text-2xl font-extrabold text-tec-400">{{ $puntuacionMaxima }}</p>
                        <p class="text-xs text-tec-200 mt-1">Último test</p>
                    </div>

                    <div class="stat-card glass-effect rounded-2xl p-6 text-center">
                        <div class="w-12 h-12 rounded-xl bg-tec-500/20 flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-trophy text-tec-400"></i>
                        </div>
                        <h4 class="font-bold mb-1">Perfil Dominante</h4>
                        <p class="text-2xl font-extrabold text-valle-400">
                            @if($ultimoResultado)
                                @php
                                    $puntos = [
                                        'R' => $ultimoResultado->resultado->puntos_R ?? 0,
                                        'I' => $ultimoResultado->resultado->puntos_I ?? 0,
                                        'A' => $ultimoResultado->resultado->puntos_A ?? 0,
                                        'S' => $ultimoResultado->resultado->puntos_S ?? 0,
                                        'E' => $ultimoResultado->resultado->puntos_E ?? 0,
                                        'C' => $ultimoResultado->resultado->puntos_C ?? 0
                                    ];
                                    arsort($puntos);
                                    $perfilDominante = array_key_first($puntos);
                                @endphp
                                {{ $perfilDominante }}
                            @else
                                --
                            @endif
                        </p>

                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="glass-effect rounded-2xl p-6">
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-bolt text-valle-400 mr-2"></i>
                        Acciones Rápidas
                    </h3>
                    <div class="space-y-3">
                        <a href="{{ route('test.history') }}"
                           class="flex items-center justify-between p-4 rounded-xl bg-white/5 hover:bg-white/10 transition-all duration-300 group">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-lg bg-tec-500/20 flex items-center justify-center">
                                    <i class="fas fa-history text-tec-400"></i>
                                </div>
                                <span>Historial de Resultados</span>
                            </div>
                            <i class="fas fa-chevron-right text-tec-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                        </a>

                        @if($ultimoResultado)
                            <a href="{{ route('reportes.generar', ['id_test' => $ultimoResultado->id_test]) }}"
                               class="flex items-center justify-between p-4 rounded-xl bg-white/5 hover:bg-white/10 transition-all duration-300 group">
                               <div class="flex items-center space-x-3">
                                   <div class="w-10 h-10 rounded-lg bg-valle-500/20 flex items-center justify-center">
                                       <i class="fas fa-download text-valle-400"></i>
                                   </div>
                                   <span>Descargar Reporte</span>
                               </div>
                               <i class="fas fa-chevron-right text-valle-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            </a>
                        @else
                            <div class="p-4 rounded-xl bg-gray-800/20 text-gray-400 text-sm text-center">
                                Aún no tienes resultados disponibles para descargar.
                            </div>
                        @endif

                    </div>
                </div>

                <div class="glass-effect rounded-2xl p-6">
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-chart-pie text-valle-400 mr-2"></i>
                        Tu Perfil RIASEC
                    </h3>
                    @if($ultimoResultado)
                    <div class="space-y-3">
                        @php
                            $dimensions = [
                                ['label' => 'Realista', 'color' => 'bg-red-500', 'puntos' => $ultimoResultado->resultado->puntos_R ?? 0],
                                ['label' => 'Investigador', 'color' => 'bg-blue-500', 'puntos' => $ultimoResultado->resultado->puntos_I ?? 0],
                                ['label' => 'Artístico', 'color' => 'bg-purple-500', 'puntos' => $ultimoResultado->resultado->puntos_A ?? 0],
                                ['label' => 'Social', 'color' => 'bg-green-500', 'puntos' => $ultimoResultado->resultado->puntos_S ?? 0],
                                ['label' => 'Emprendedor', 'color' => 'bg-yellow-500', 'puntos' => $ultimoResultado->resultado->puntos_E ?? 0],
                                ['label' => 'Convencional', 'color' => 'bg-indigo-500', 'puntos' => $ultimoResultado->resultado->puntos_C ?? 0],
                            ];

                            $maxPuntos = max(1, collect($dimensions)->max('puntos'));

                            // crea un nuevo arreglo con los porcentajes calculados sin referencias
                            $dimensions = collect($dimensions)->map(function($dim) use ($maxPuntos) {
                                $dim['porcentaje'] = round(($dim['puntos'] / $maxPuntos) * 100);
                                return $dim;
                            })->toArray();
                        @endphp

                        @foreach($dimensions as $dim)
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-tec-200 w-24">{{ $dim['label'] }}</span>
                            <div class="flex-1 mx-3">
                                <div class="w-full bg-tec-700 rounded-full h-2">
                                    <div class="{{ $dim['color'] }} h-2 rounded-full" style="width: {{ $dim['porcentaje'] }}%"></div>
                                </div>
                            </div>
                            <span class="text-sm font-semibold w-8 text-right">{{ $dim['puntos'] }}</span>
                        </div>
                        @endforeach
                        <div class="text-xs text-tec-400 text-center mt-2">
                            Puntuación máxima por categoría: 7 puntos
                        </div>
                    </div>
                    @else
                    <div class="text-center py-8">
                        <div class="w-16 h-16 rounded-full bg-tec-500/20 flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-clipboard-question text-tec-400 text-xl"></i>
                        </div>
                        <h4 class="text-lg font-semibold mb-2">Sin resultados aún</h4>
                        <p class="text-tec-200 text-sm">Completa tu primer test para ver tu perfil RIASEC</p>
                    </div>
                    @endif
                </div>

                <div class="glass-effect rounded-2xl p-6">
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-lightbulb text-yellow-400 mr-2"></i>
                        Tip del Día
                    </h3>
                    <p class="text-tec-200 text-sm leading-relaxed text-justify">
                        "El 85% de las personas que realizan tests vocacionales toman decisiones más acertadas sobre su carrera profesional. ¡Completa tu test para descubrir tu verdadero potencial!"
                    </p>
                </div>
            </div>
        </div>
    </main>

    <footer class="container mx-auto px-4 py-8 mt-12 border-t border-tec-700/50 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center space-x-3 mb-4 md:mb-0">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-white"></i>
                </div>
                <div>
                    <span class="text-xl font-bold">InspiraTec</span>
                    <p class="text-xs text-tec-300">TESVB Campus Valle de Bravo</p>
                </div>
            </div>
            <div class="text-center md:text-right text-tec-300">
                <p>© 2025 Tecnológico de Estudios Superiores de Valle de Bravo</p>
                <p class="text-sm mt-1">Plataforma de Orientación Vocacional RIASEC</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            const progressBars = document.querySelectorAll('.bg-gradient-to-r');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.transition = 'width 1.5s ease-in-out';
                    bar.style.width = width;
                }, 500);
            });
        });
    </script>
</body>
</html>
