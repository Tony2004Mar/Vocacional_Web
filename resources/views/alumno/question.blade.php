<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Vocacional - InspiraTec</title>
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
                        'pulse-gentle': 'pulseGentle 2s ease-in-out infinite',
                        'bounce-subtle': 'bounceSubtle 1s infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        pulseGentle: {
                            '0%, 100%': { opacity: '1' },
                            '50%': { opacity: '0.8' },
                        },
                        bounceSubtle: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-5px)' },
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
        .progress-bar {
            transition: width 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .question-card {
            background: linear-gradient(135deg, rgba(0, 128, 255, 0.15) 0%, rgba(77, 190, 77, 0.15) 100%);
            backdrop-filter: blur(10px);
        }
        .answer-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        .answer-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        .answer-btn:hover::before {
            left: 100%;
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
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        .pulse-ring {
            animation: pulseRing 2s ease-out infinite;
        }
        @keyframes pulseRing {
            0% { transform: scale(0.8); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.5; }
            100% { transform: scale(0.8); opacity: 1; }
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
                            <p class="text-xs text-tec-200">Test Vocacional</p>
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
        <!-- Progress Section -->
        <div class="max-w-4xl mx-auto mb-8 animate-fade-in-up">
            <div class="flex justify-between items-center mb-4">
                <div class="text-center md:text-left">
                    <h2 class="text-2xl md:text-3xl font-bold mb-2">
                        Pregunta <span class="text-valle-400">{{ $index + 1 }}</span>
                        <span class="text-tec-300">/ {{ \App\Models\Pregunta::count() }}</span>
                    </h2>
                    <p class="text-tec-200">Descubre tu verdadera vocación</p>
                </div>
                <div class="hidden md:flex items-center space-x-2 glass-effect px-4 py-2 rounded-full">
                    <i class="fas fa-clock text-valle-400"></i>
                    <span class="text-sm">~{{ round((\App\Models\Pregunta::count() - ($index + 1)) * 0.4) }} min restantes</span>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="glass-effect rounded-2xl p-4">
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-tec-200">Tu progreso</span>
                    <span class="font-semibold text-valle-400">{{ round((($index + 1) / \App\Models\Pregunta::count()) * 100) }}%</span>
                </div>
                <div class="w-full bg-tec-700 rounded-full h-3 overflow-hidden">
                    <div class="progress-bar bg-gradient-to-r from-tec-500 to-valle-500 h-3 rounded-full"
                         style="width: {{ (($index + 1) / \App\Models\Pregunta::count()) * 100 }}%">
                    </div>
                </div>
                <div class="flex justify-between text-xs text-tec-400 mt-1">
                    <span>Inicio</span>
                    <span>Final</span>
                </div>
            </div>
        </div>

        <!-- Question Card -->
        <div class="max-w-4xl mx-auto animate-fade-in-up">
            <div class="question-card rounded-2xl p-8 mb-8 shadow-2xl">
                <!-- Question Number Badge -->
                <div class="flex justify-center mb-6">
                    <div class="relative">
                        <div class="pulse-ring absolute inset-0 rounded-full bg-valle-500/30"></div>
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center shadow-lg relative z-10">
                            <span class="text-white font-bold text-xl">{{ $index + 1 }}</span>
                        </div>
                    </div>
                </div>

                <!-- Question Text -->
                <div class="text-center mb-8">
                    <h3 class="text-2xl md:text-3xl font-bold leading-relaxed text-white">
                        {{ $pregunta['descripcion'] }}
                    </h3>
                    <p class="text-tec-200 mt-4 text-lg">Selecciona la opción que mejor te describa</p>
                </div>

                <!-- Answer Buttons -->
                <form action="{{ route('test.answer', ['test'=>$test->id_test]) }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="id_pregunta" value="{{ $pregunta['id_pregunta'] }}">
                    <input type="hidden" name="index" value="{{ $index }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Sí Button -->
                        <button type="submit" name="respuesta" value="si"
                                class="answer-btn w-full py-6 rounded-2xl bg-gradient-to-r from-valle-500 to-valle-600 hover:from-valle-600 hover:to-valle-700 text-white font-bold text-lg shadow-2xl transform hover:scale-105 group">
                            <div class="flex items-center justify-center space-x-3">
                                <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-check text-xl text-white"></i>
                                </div>
                                <div class="text-left">
                                    <div class="text-2xl font-bold">Sí</div>
                                    <div class="text-sm opacity-80">Esta actividad me describe</div>
                                </div>
                            </div>
                        </button>

                        <!-- No Button -->
                        <button type="submit" name="respuesta" value="no"
                                class="answer-btn w-full py-6 rounded-2xl bg-gradient-to-r from-tec-500 to-tec-600 hover:from-tec-600 hover:to-tec-700 text-white font-bold text-lg shadow-2xl transform hover:scale-105 group">
                            <div class="flex items-center justify-center space-x-3">
                                <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-times text-xl text-white"></i>
                                </div>
                                <div class="text-left">
                                    <div class="text-2xl font-bold">No</div>
                                    <div class="text-sm opacity-80">No me identifica</div>
                                </div>
                            </div>
                        </button>
                    </div>
                </form>

                <!-- Tips Section -->
                <div class="mt-8 pt-6 border-t border-tec-700/50">
                    <div class="flex items-center justify-center space-x-4 text-sm text-tec-300">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-lightbulb text-yellow-400"></i>
                            <span>Responde con honestidad</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-brain text-valle-400"></i>
                            <span>No hay respuestas correctas o incorrectas</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Info -->
            <div class="glass-effect rounded-2xl p-6 text-center">
                <div class="grid grid-cols-3 gap-4 text-sm">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-valle-400">{{ $index + 1 }}</div>
                        <div class="text-tec-200">Actual</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-tec-400">{{ \App\Models\Pregunta::count() - ($index + 1) }}</div>
                        <div class="text-tec-200">Restantes</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-valle-400">{{ \App\Models\Pregunta::count() }}</div>
                        <div class="text-tec-200">Total</div>
                    </div>
                </div>
            </div>
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
                <p class="text-sm mt-1">Test Vocacional RIASEC - Pregunta {{ $index + 1 }} de {{ \App\Models\Pregunta::count() }}</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animación de la barra de progreso
            const progressBar = document.querySelector('.progress-bar');
            progressBar.style.width = '0';
            setTimeout(() => {
                progressBar.style.width = '{{ (($index + 1) / \App\Models\Pregunta::count()) * 100 }}%';
            }, 500);

            // Efectos de hover mejorados para los botones
            const answerButtons = document.querySelectorAll('.answer-btn');
            answerButtons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px) scale(1.05)';
                });
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Efecto de carga para la pregunta
            const questionCard = document.querySelector('.question-card');
            questionCard.style.opacity = '0';
            questionCard.style.transform = 'translateY(20px)';

            setTimeout(() => {
                questionCard.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
                questionCard.style.opacity = '1';
                questionCard.style.transform = 'translateY(0)';
            }, 300);

            // Contador de tiempo estimado
            let timeRemaining = {{ round((\App\Models\Pregunta::count() - ($index + 1)) * 0.4) }};
            const timeElement = document.querySelector('.text-sm span');

            if (timeElement) {
                setInterval(() => {
                    if (timeRemaining > 0) {
                        timeRemaining--;
                        timeElement.textContent = `~${timeRemaining} min restantes`;
                    }
                }, 60000); // Actualizar cada minuto
            }
        });
    </script>
</body>
</html>
