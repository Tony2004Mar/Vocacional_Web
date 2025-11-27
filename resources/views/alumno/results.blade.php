<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados - InspiraTec</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        'bounce-subtle': 'bounceSubtle 2s infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                            '50%': { transform: 'translateY(-10px) rotate(5deg)' },
                        },
                        bounceSubtle: {
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
        .hero-card {
            background: linear-gradient(135deg, rgba(0, 128, 255, 0.2) 0%, rgba(77, 190, 77, 0.2) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
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
        .riasec-badge {
            padding: 0.5rem 1rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
        }
        .riasec-R { background: linear-gradient(135deg, #ef4444, #dc2626); }
        .riasec-I { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .riasec-A { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
        .riasec-S { background: linear-gradient(135deg, #10b981, #059669); }
        .riasec-E { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .riasec-C { background: linear-gradient(135deg, #6366f1, #4f46e5); }
        .career-card {
            transition: all 0.3s ease;
        }
        .career-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
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
                <div class="flex items-center space-x-3">
                    <a href="{{ route('estudiante.home') }}" class="flex items-center space-x-3 group">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-arrow-left text-white"></i>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold">InspiraTec</h1>
                            <p class="text-xs text-tec-200">Resultados del Test</p>
                        </div>
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="hidden md:flex items-center space-x-2 glass-effect px-4 py-2 rounded-full">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center shadow-md">
                            <span class="text-white font-bold text-sm">{{ substr(auth()->user()->nombre ?? auth()->user()->name, 0, 1) }}</span>
                        </div>
                        <span class="font-medium">{{ auth()->user()->nombre ?? auth()->user()->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 relative z-10">
        <!-- Hero Section -->
        <div class="hero-card rounded-3xl p-8 mb-8 text-center animate-fade-in-up">
            <div class="w-24 h-24 rounded-2xl bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center mx-auto mb-6 shadow-2xl animate-bounce-subtle">
                <i class="fas fa-trophy text-3xl text-white"></i>
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold mb-4">
                ¡Test <span class="bg-gradient-to-r from-tec-400 to-valle-400 bg-clip-text text-transparent">Completado</span>!
            </h2>
            <p class="text-xl text-tec-200 max-w-2xl mx-auto">
                Descubre tu perfil vocacional y las carreras que mejor se adaptan a tu personalidad
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <!-- Left Column - Dominant Profile -->
            <div class="lg:col-span-1">
                <div class="glass-effect rounded-2xl p-6 mb-6 animate-fade-in-up">
                    <h3 class="text-2xl font-bold mb-4 flex items-center">
                        <i class="fas fa-crown text-yellow-400 mr-3"></i>
                        Tu Perfil Dominante
                    </h3>

                    <div class="text-center mb-6">
                        <div class="flex justify-center flex-wrap gap-3 mb-4">
                            @foreach($topCategorias as $categoria)
                                <span class="riasec-badge riasec-{{ $categoria }} text-lg px-6 py-3">
                                    {{ $categoria }}
                                </span>
                            @endforeach
                        </div>
                        <p class="text-tec-200 text-sm">
                            Este es tu tipo de personalidad profesional más destacado según el modelo RIASEC
                        </p>
                    </div>

                    <!-- Profile Description -->
                    <div class="space-y-3">
                        @php
                            $descriptions = [
                                'R' => 'Personas prácticas y mecánicas que disfrutan trabajar con herramientas y objetos.',
                                'I' => 'Personas analíticas e intelectuales orientadas a la investigación y el análisis.',
                                'A' => 'Personas creativas y expresivas que disfrutan actividades artísticas y originales.',
                                'S' => 'Personas cooperativas y serviciales orientadas a ayudar y enseñar a otros.',
                                'E' => 'Personas ambiciosas y persuasivas que disfrutan liderar y emprender.',
                                'C' => 'Personas organizadas y detallistas que prefieren ambientes estructurados.'
                            ];
                        @endphp

                        @foreach($topCategorias as $categoria)
                            <div class="p-4 rounded-xl bg-white/5">
                                <h4 class="font-semibold mb-2">{{ $categoria }} -
                                    @if($categoria == 'R') Realista
                                    @elseif($categoria == 'I') Investigador
                                    @elseif($categoria == 'A') Artístico
                                    @elseif($categoria == 'S') Social
                                    @elseif($categoria == 'E') Emprendedor
                                    @else Convencional
                                    @endif
                                </h4>
                                <p class="text-sm text-tec-200">{{ $descriptions[$categoria] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="glass-effect rounded-2xl p-6 animate-fade-in-up">
                    <h4 class="text-lg font-bold mb-4">Resumen de Puntajes</h4>
                    <div class="space-y-3">
                        @php
                            $maxPuntos = max($puntos);
                        @endphp

                        @foreach(['R', 'I', 'A', 'S', 'E', 'C'] as $cat)
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-tec-200 w-8">{{ $cat }}</span>
                                <div class="flex-1 mx-3">
                                    <div class="w-full bg-tec-700 rounded-full h-2">
                                        <div class="h-2 rounded-full
                                            @if($cat == 'R') bg-red-500
                                            @elseif($cat == 'I') bg-blue-500
                                            @elseif($cat == 'A') bg-purple-500
                                            @elseif($cat == 'S') bg-green-500
                                            @elseif($cat == 'E') bg-yellow-500
                                            @else bg-indigo-500
                                            @endif"
                                            style="width: {{ $maxPuntos > 0 ? ($puntos[$cat] / $maxPuntos) * 100 : 0 }}%">
                                        </div>
                                    </div>
                                </div>
                                <span class="text-sm font-semibold w-12 text-right">{{ $puntos[$cat] }} pts</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <!-- Chart Section -->
                <div class="glass-effect rounded-2xl p-6 mb-6 animate-fade-in-up">
                    <h3 class="text-2xl font-bold mb-6 flex items-center">
                        <i class="fas fa-chart-bar text-valle-400 mr-3"></i>
                        Distribución de tu Perfil RIASEC
                    </h3>
                    <div class="chart-container">
                        <canvas id="resultChart"></canvas>
                    </div>
                </div>

                <!-- Recommended Careers -->
                <div class="glass-effect rounded-2xl p-6 animate-fade-in-up">
                    <h3 class="text-2xl font-bold mb-6 flex items-center">
                        <i class="fas fa-graduation-cap text-tec-400 mr-3"></i>
                        Carreras Recomendadas
                    </h3>

                    @if($carreras->whereIn('cat_codigo', $topCategorias)->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($carreras->whereIn('cat_codigo', $topCategorias) as $carrera)
                                <div class="career-card glass-effect rounded-xl p-4 bg-white/5 hover:bg-white/10 transition-all duration-300">
                                    <div class="flex items-start justify-between mb-3">
                                        <h4 class="font-semibold text-lg">{{ $carrera->nombre }}</h4>
                                        <span class="riasec-badge riasec-{{ $carrera->cat_codigo }} text-xs">
                                            {{ $carrera->cat_codigo }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-tec-200 mb-3">
                                        Compatible con tu perfil {{ $carrera->cat_codigo }}
                                    </p>
                                    <div class="flex items-center justify-between text-xs text-tec-400">
                                        <span>Recomendada</span>
                                        <div class="flex items-center space-x-1">
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="w-16 h-16 rounded-full bg-tec-500/20 flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-search text-tec-400 text-xl"></i>
                            </div>
                            <h4 class="text-lg font-semibold mb-2">No hay carreras relacionadas aún</h4>
                            <p class="text-tec-200 text-sm">Próximamente se agregarán más opciones de carreras</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <a href="{{ route('estudiante.home') }}"
               class="glass-effect hover:bg-white/10 rounded-2xl p-6 text-center transition-all duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-tec-500/20 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-home text-tec-400"></i>
                </div>
                <h4 class="font-semibold mb-2">Volver al Dashboard</h4>
                <p class="text-sm text-tec-200">Continuar explorando</p>
            </a>

            <a href="{{ route('test.history') }}"
               class="glass-effect hover:bg-white/10 rounded-2xl p-6 text-center transition-all duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-valle-500/20 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-history text-valle-400"></i>
                </div>
                <h4 class="font-semibold mb-2">Ver Historial</h4>
                <p class="text-sm text-tec-200">Comparar resultados</p>
            </a>

            <button onclick="window.print()"
                    class="glass-effect hover:bg-white/10 rounded-2xl p-6 text-center transition-all duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-tec-500/20 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-print text-tec-400"></i>
                </div>
                <h4 class="font-semibold mb-2">Imprimir</h4>
                <p class="text-sm text-tec-200">Guardar resultados</p>
            </button>
        </div>
    </main>

    <!-- Footer -->
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
                <p class="text-sm mt-1">Resultados del Test Vocacional RIASEC</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categorias = ['R', 'I', 'A', 'S', 'E', 'C'];
            const puntos = [
                {{ $puntos['R'] }},
                {{ $puntos['I'] }},
                {{ $puntos['A'] }},
                {{ $puntos['S'] }},
                {{ $puntos['E'] }},
                {{ $puntos['C'] }}
            ];

            const topCategorias = @json($topCategorias);

            // Colores mejorados para el gráfico
            const backgroundColors = categorias.map(cat =>
                topCategorias.includes(cat)
                    ? getComputedStyle(document.documentElement).getPropertyValue(`--color-${cat.toLowerCase()}`) ||
                      (cat === 'R' ? 'rgba(239, 68, 68, 0.8)' :
                       cat === 'I' ? 'rgba(59, 130, 246, 0.8)' :
                       cat === 'A' ? 'rgba(139, 92, 246, 0.8)' :
                       cat === 'S' ? 'rgba(16, 185, 129, 0.8)' :
                       cat === 'E' ? 'rgba(245, 158, 11, 0.8)' :
                       'rgba(99, 102, 241, 0.8)')
                    : 'rgba(255, 255, 255, 0.2)'
            );

            const borderColors = categorias.map(cat =>
                topCategorias.includes(cat)
                    ? (cat === 'R' ? 'rgb(239, 68, 68)' :
                       cat === 'I' ? 'rgb(59, 130, 246)' :
                       cat === 'A' ? 'rgb(139, 92, 246)' :
                       cat === 'S' ? 'rgb(16, 185, 129)' :
                       cat === 'E' ? 'rgb(245, 158, 11)' :
                       'rgb(99, 102, 241)')
                    : 'rgba(255, 255, 255, 0.5)'
            );

            const ctx = document.getElementById('resultChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Realista (R)', 'Investigador (I)', 'Artístico (A)', 'Social (S)', 'Emprendedor (E)', 'Convencional (C)'],
                    datasets: [{
                        label: 'Puntaje',
                        data: puntos,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        borderWidth: 2,
                        borderRadius: 8,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: '#ffffff',
                            bodyColor: '#ffffff',
                            borderColor: 'rgba(255, 255, 255, 0.2)',
                            borderWidth: 1,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    return `Puntuación: ${context.parsed.y}`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: Math.max(...puntos) + 5,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.7)',
                                callback: function(value) {
                                    return value + ' pts';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.7)',
                                font: {
                                    size: 11
                                }
                            }
                        }
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeOutQuart'
                    }
                }
            });

            // Animación de las tarjetas de carrera
            const careerCards = document.querySelectorAll('.career-card');
            careerCards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('animate-fade-in-up');
            });
        });
    </script>
</body>
</html>
</html>
