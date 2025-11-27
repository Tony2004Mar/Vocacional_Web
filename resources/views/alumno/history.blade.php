<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial - InspiraTec</title>
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
        .test-card {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, rgba(0, 128, 255, 0.1) 0%, rgba(77, 190, 77, 0.1) 100%);
        }
        .test-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        .badge {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.75rem;
        }
        .badge-completed {
            background: linear-gradient(135deg, #4dbe4d, #3d983d);
        }
        .badge-progress {
            background: linear-gradient(135deg, #ffa500, #ff8c00);
        }
        .riasec-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.7rem;
            text-transform: uppercase;
        }
        .riasec-R { background: linear-gradient(135deg, #ef4444, #dc2626); }
        .riasec-I { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .riasec-A { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
        .riasec-S { background: linear-gradient(135deg, #10b981, #059669); }
        .riasec-E { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .riasec-C { background: linear-gradient(135deg, #6366f1, #4f46e5); }

        .mini-chart-container {
            position: relative;
            height: 120px;
            width: 100%;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: linear-gradient(135deg, #003366 0%, #001a33 100%);
            border-radius: 20px;
            padding: 2rem;
            max-width: 500px;
            width: 90%;
            transform: scale(0.9);
            transition: transform 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }

        .modal-overlay.active .modal-content {
            transform: scale(1);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen font-sans text-white overflow-x-hidden">
    <!-- Floating Shapes -->
    <div class="floating-shapes shape-1"></div>
    <div class="floating-shapes shape-2"></div>

    <!-- Modal de Confirmación -->
    <div id="deleteModal" class="modal-overlay">
        <div class="modal-content">
            <div class="text-center mb-6">
                <div class="w-16 h-16 rounded-full bg-red-500/20 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-exclamation-triangle text-red-400 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-2">¿Eliminar Test?</h3>
                <p class="text-tec-200">Esta acción no se puede deshacer. Se eliminarán todos los datos de este test.</p>
            </div>
            <div class="flex space-x-4">
                <button id="cancelDelete" class="flex-1 glass-effect hover:bg-white/10 py-3 rounded-xl font-semibold transition-all duration-300">
                    Cancelar
                </button>
                <button id="confirmDelete" class="flex-1 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 py-3 rounded-xl font-semibold transition-all duration-300">
                    <i class="fas fa-trash mr-2"></i>Eliminar
                </button>
            </div>
        </div>
    </div>

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
                            <p class="text-xs text-tec-200">Historial de Tests</p>
                        </div>
                    </a>
                </div>
             <div class="text-center">
                        <a href="{{ route('estudiante.home') }}"
                           class="inline-flex items-center px-6 py-3 glass-effect hover:bg-white/10 rounded-xl transition-all duration-300 font-semibold">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Volver al Dashboard
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
        <!-- Header Section -->
        <div class="text-center mb-8 animate-fade-in-up">
            <h2 class="text-4xl md:text-5xl font-extrabold mb-4">
                Tu <span class="bg-gradient-to-r from-tec-400 to-valle-400 bg-clip-text text-transparent">Historial</span>
            </h2>
            <p class="text-xl text-tec-200 max-w-2xl mx-auto">
                Revisa todos tus tests vocacionales realizados y sus resultados detallados
            </p>
        </div>

        @if($tests->isEmpty())
        <!-- Empty State -->
        <div class="glass-effect rounded-2xl p-12 text-center animate-fade-in-up">
            <div class="w-24 h-24 rounded-full bg-tec-500/20 flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-clipboard-list text-4xl text-tec-400"></i>
            </div>
            <h3 class="text-2xl font-bold mb-4">No hay tests realizados</h3>
            <p class="text-tec-200 mb-6 max-w-md mx-auto">
                Aún no has completado ningún test vocacional. ¡Comienza tu viaje de autodescubrimiento ahora!
            </p>
            <a href="{{ route('estudiante.home') }}"
               class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-tec-500 to-valle-500 rounded-xl hover:from-tec-600 hover:to-valle-600 transition-all duration-300 font-semibold shadow-lg">
                <i class="fas fa-rocket mr-3"></i>
                Realizar Primer Test
            </a>
        </div>
        @else

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
            @foreach($tests as $test)
                @php
                    $estado = $test->estado;
                    $resultado = $test->resultado;
                    $topCategorias = [];
                    $puntosData = [];

                    if ($resultado) {
                        $puntos = [
                            'R' => $resultado->puntos_R ?? 0,
                            'I' => $resultado->puntos_I ?? 0,
                            'A' => $resultado->puntos_A ?? 0,
                            'S' => $resultado->puntos_S ?? 0,
                            'E' => $resultado->puntos_E ?? 0,
                            'C' => $resultado->puntos_C ?? 0,
                        ];
                        arsort($puntos);
                        $topCategorias = array_slice(array_keys($puntos), 0, 1);
                        $puntosData = $puntos;
                    }

                    $carreras = collect();
                    if ($topCategorias) {
                        $carreras = DB::table('carreras')
                            ->join('carrera_categoria','carreras.id_carrera','=','carrera_categoria.id_carrera')
                            ->join('categorias_riasec','carrera_categoria.id_categoria','=','categorias_riasec.id_categoria')
                            ->whereIn('categorias_riasec.codigo', $topCategorias)
                            ->select('carreras.nombre')
                            ->limit(2)
                            ->get();
                    }
                @endphp

                <div class="test-card glass-effect rounded-2xl p-4 animate-fade-in-up">
                    <!-- Test Header -->
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h3 class="text-sm font-bold mb-1">Test Vocacional</h3>
                            <p class="text-xs text-tec-200">
                                @if($test->fecha_finalizacion)
                                    {{ $test->fecha_finalizacion->format('d/m/Y') }}
                                @else
                                    {{ $test->fecha_inicio->format('d/m/Y') }}
                                @endif
                            </p>
                        </div>
                        <div class="text-right">
                            @if($test->estado && $test->estado->nombre == 'finalizado')
                                <span class="badge badge-completed text-xs">Completado</span>
                            @else
                                <span class="badge badge-progress text-xs">En Progreso</span>
                            @endif
                        </div>
                    </div>

                    @if($estado && $estado->nombre == 'finalizado' && !empty($puntosData))
                    <div class="mb-3">
                        <div class="mini-chart-container">
                            <canvas id="chart-{{ $test->id_test }}"></canvas>
                        </div>
                    </div>

                    <!-- Dominant Category -->
                    <div class="mb-3 text-center">
                        <h4 class="text-xs font-semibold text-tec-200 mb-1">Perfil Dominante</h4>
                        <div class="flex justify-center flex-wrap gap-1">
                            @if($topCategorias)
                                @foreach($topCategorias as $categoria)
                                    <span class="riasec-badge riasec-{{ $categoria }} text-xs">
                                        {{ $categoria }}
                                    </span>
                                @endforeach
                            @else
                                <span class="text-xs text-tec-400">Sin resultados</span>
                            @endif
                        </div>
                    </div>
                    @else
                    <!-- Placeholder para tests en progreso -->
                    <div class="mb-3 text-center py-4">
                        <div class="w-10 h-10 rounded-full bg-tec-500/20 flex items-center justify-center mx-auto mb-2">
                            <i class="fas fa-spinner text-tec-400 text-sm animate-spin"></i>
                        </div>
                        <p class="text-tec-200 text-xs">Test en progreso</p>
                    </div>
                    @endif

                    <!-- Recommended Careers -->
                    @if($estado == 'finalizado' && $carreras->isNotEmpty())
                    <div class="mb-3">
                        <h4 class="text-xs font-semibold text-tec-200 mb-1 text-center">Carreras Recomendadas</h4>
                        <div class="space-y-1">
                            @foreach($carreras as $carrera)
                                <div class="flex items-center space-x-2 p-1 rounded-lg bg-white/5">
                                    <i class="fas fa-graduation-cap text-valle-400 text-xs"></i>
                                    <span class="text-xs flex-1 truncate">{{ $carrera->nombre }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center pt-3 border-t border-tec-700/50">
                         @if($test->estado && $test->estado->nombre == 'en_progreso')
                          <a href="{{ route('test.question', ['test' => $test->id_test, 'index' => $test->id_pregunta_actual ?? 0]) }}"
                               class="flex-1 bg-gradient-to-r from-tec-500 to-valle-500 hover:from-tec-600 hover:to-valle-600 text-white py-2 px-3 rounded-lg text-xs text-center font-semibold transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-play mr-1"></i>Continuar
                            </a>
                        @else
                          <a href="{{ route('test.result', $test->id_test) }}"
                             class="flex-1 bg-gradient-to-r from-tec-500 to-valle-500 hover:from-tec-600 hover:to-valle-600 text-white py-2 px-3 rounded-lg text-xs text-center font-semibold transition-all duration-300 transform hover:scale-105 mr-1">
                              <i class="fas fa-chart-bar mr-1"></i>Detalles
                          </a>
                        @endif

                        <!-- Botón de eliminar -->
                        <button class="delete-test bg-red-500/20 hover:bg-red-500/30 text-red-400 p-2 rounded-lg transition-all duration-300"
                                data-test-id="{{ $test->id_test }}">
                            <i class="fas fa-trash text-xs"></i>
                        </button>
                    </div>
                </div>

                @if($estado && $estado->nombre == 'finalizado' && !empty($puntosData))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const ctx = document.getElementById('chart-{{ $test->id_test }}').getContext('2d');


                        const backgroundColors = [
                            'rgba(239, 68, 68, 0.8)',
                            'rgba(59, 130, 246, 0.8)',
                            'rgba(139, 92, 246, 0.8)',
                            'rgba(16, 185, 129, 0.8)',
                            'rgba(245, 158, 11, 0.8)',
                            'rgba(99, 102, 241, 0.8)'
                        ];

                        const borderColors = [
                            'rgb(239, 68, 68)',
                            'rgb(59, 130, 246)',
                            'rgb(139, 92, 246)',
                            'rgb(16, 185, 129)',
                            'rgb(245, 158, 11)',
                            'rgb(99, 102, 241)'
                        ];


                        const rawData = [
                            {{ $puntosData['R'] }},
                            {{ $puntosData['I'] }},
                            {{ $puntosData['A'] }},
                            {{ $puntosData['S'] }},
                            {{ $puntosData['E'] }},
                            {{ $puntosData['C'] }}
                        ];


                        const maxValue = Math.max(...rawData);
                        const normalizedData = rawData.map(value => (value / maxValue) * 10);

                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['R', 'I', 'A', 'S', 'E', 'C'],
                                datasets: [{
                                    data: normalizedData,
                                    backgroundColor: backgroundColors,
                                    borderColor: borderColors,
                                    borderWidth: 1,
                                    borderRadius: 4,
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
                                                const originalValue = rawData[context.dataIndex];
                                                return `Puntuación: ${originalValue} (${context.parsed.y.toFixed(1)}/10)`;
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        max: 10,
                                        grid: {
                                            color: 'rgba(255, 255, 255, 0.1)',
                                            drawBorder: false
                                        },
                                        ticks: {
                                            color: 'rgba(255, 255, 255, 0.5)',
                                            font: {
                                                size: 8
                                            },
                                            stepSize: 2,
                                            callback: function(value) {
                                                return value;
                                            }
                                        }
                                    },
                                    x: {
                                        grid: {
                                            display: false,
                                            drawBorder: false
                                        },
                                        ticks: {
                                            color: 'rgba(255, 255, 255, 0.7)',
                                            font: {
                                                size: 9,
                                                weight: 'bold'
                                            }
                                        }
                                    }
                                },
                                animation: {
                                    duration: 1500,
                                    easing: 'easeOutQuart'
                                }
                            }
                        });
                    });
                </script>
                @endif
            @endforeach
        </div>

        <!-- Stats Summary - Actualizado con IDs para actualización dinámica -->
        <div class="glass-effect rounded-2xl p-6 mb-8">
            <h3 class="text-xl font-bold mb-4 flex items-center">
                <i class="fas fa-chart-line text-valle-400 mr-3"></i>
                Resumen de tu Progreso
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="text-center p-4 rounded-xl bg-white/5">
                    <div id="stats-completed" class="text-2xl font-bold text-valle-400">
                        {{ $tests->filter(fn($test) => $test->estado && $test->estado->nombre === 'finalizado')->count() }}
                    </div>
                    <div class="text-sm text-tec-200">Tests Completados</div>
                </div>
                <div class="text-center p-4 rounded-xl bg-white/5">
                    <div id="stats-progress" class="text-2xl font-bold text-tec-400">
                       {{ $tests->filter(fn($test) => $test->estado && $test->estado->nombre === 'en_progreso')->count() }}
                    </div>
                    <div class="text-sm text-tec-200">En Progreso</div>
                </div>
                <div class="text-center p-4 rounded-xl bg-white/5">
                    <div id="stats-total" class="text-2xl font-bold text-valle-400">
                        {{ $tests->count() }}
                    </div>
                    <div class="text-sm text-tec-200">Total de Tests</div>
                </div>
                <div class="text-center p-4 rounded-xl bg-white/5">
                    <div id="stats-days" class="text-2xl font-bold text-tec-400">
                        @php
                            $primeraFecha = $tests->min('fecha_inicio');
                            $dias = $primeraFecha ? now()->diffInDays($primeraFecha) : 0;
                        @endphp
                        {{ $dias }}
                    </div>
                    <div class="text-sm text-tec-200">Días de Seguimiento</div>
                </div>
            </div>
        </div>
        @endif

        <!-- Back Button -->
        <div class="text-center">
            <a href="{{ route('estudiante.home') }}"
               class="inline-flex items-center px-6 py-3 glass-effect hover:bg-white/10 rounded-xl transition-all duration-300 font-semibold">
                <i class="fas fa-arrow-left mr-2"></i>
                Volver al Dashboard
            </a>
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
                <p class="text-sm mt-1">Tu historial de crecimiento profesional</p>
            </div>
        </div>
    </footer>

    <script>
        // Variables globales para el manejo de eliminación
        let testToDelete = null;
        const deleteModal = document.getElementById('deleteModal');
        const cancelDeleteBtn = document.getElementById('cancelDelete');
        const confirmDeleteBtn = document.getElementById('confirmDelete');

        // Configurar event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Efecto de aparición escalonada para las tarjetas
            const cards = document.querySelectorAll('.test-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });

            // Efecto hover mejorado
            const testCards = document.querySelectorAll('.test-card');
            testCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px) scale(1.02)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            const deleteButtons = document.querySelectorAll('.delete-test');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    testToDelete = this.getAttribute('data-test-id');
                    showDeleteModal();
                });
            });

            cancelDeleteBtn.addEventListener('click', hideDeleteModal);
            confirmDeleteBtn.addEventListener('click', deleteTest);

            deleteModal.addEventListener('click', function(e) {
                if (e.target === deleteModal) {
                    hideDeleteModal();
                }
            });
        });


        function showDeleteModal() {
            deleteModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function hideDeleteModal() {
            deleteModal.classList.remove('active');
            document.body.style.overflow = 'auto';
            testToDelete = null;
        }

        async function deleteTest() {
            if (!testToDelete) return;

            try {

                confirmDeleteBtn.innerHTML = '<i class="fas fa-spinner animate-spin mr-2"></i>Eliminando...';
                confirmDeleteBtn.disabled = true;

                const response = await fetch(`/test/${testToDelete}/eliminar`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    const testCard = document.querySelector(`[data-test-id="${testToDelete}"]`).closest('.test-card');
                    testCard.style.opacity = '0';
                    testCard.style.transform = 'scale(0.8)';

                    setTimeout(() => {
                        testCard.remove();


                        if (data.stats) {
                            updateStats(data.stats);
                        }


                        showNotification('Test eliminado correctamente', 'success');

                        checkEmptyState();

                    }, 300);
                } else {
                    showNotification(data.message || 'Error al eliminar el test', 'error');
                }

            } catch (error) {
                console.error('Error:', error);
                showNotification('Error de conexión al eliminar el test', 'error');
            } finally {
                // Restaurar botón
                confirmDeleteBtn.innerHTML = '<i class="fas fa-trash mr-2"></i>Eliminar';
                confirmDeleteBtn.disabled = false;
                hideDeleteModal();
            }
        }


        function updateStats(stats) {
            document.getElementById('stats-completed').textContent = stats.completados;
            document.getElementById('stats-progress').textContent = stats.en_progreso;
            document.getElementById('stats-total').textContent = stats.total;
            document.getElementById('stats-days').textContent = stats.dias_seguimiento;
        }


        function checkEmptyState() {
            const remainingTests = document.querySelectorAll('.test-card').length;
            if (remainingTests === 0) {

                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            }
        }


        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 glass-effect px-6 py-4 rounded-xl z-50 transform translate-x-full transition-transform duration-300 ${
                type === 'success' ? 'border-l-4 border-green-500' : 'border-l-4 border-red-500'
            }`;

            notification.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} ${
                        type === 'success' ? 'text-green-400' : 'text-red-400'
                    } mr-3"></i>
                    <span>${message}</span>
                </div>
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);

            setTimeout(() => {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }
    </script>
</body>
</html>
