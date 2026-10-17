<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard · Inspiratec | TESVB Valle de Bravo</title>
    <meta name="description" content="Panel principal de Inspiratec. Realiza tu test vocacional RIASEC y descubre tu perfil.">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                        display: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        tec: {
                            50:'#e6f7ff',100:'#b3e0ff',200:'#80c9ff',300:'#4db3ff',
                            400:'#1a9cff',500:'#0080ff',600:'#0066cc',700:'#004d99',
                            800:'#003366',900:'#001a33',950:'#000d1a',
                        },
                        valle: {
                            50:'#f0f9f0',100:'#dcf2dc',200:'#b8e5b8',300:'#95d895',
                            400:'#71cb71',500:'#4dbe4d',600:'#3d983d',700:'#2e722e',
                            800:'#1e4c1e',900:'#0f260f',
                        }
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) both',
                        'fade-in-down': 'fadeInDown 0.8s cubic-bezier(0.16, 1, 0.3, 1) both',
                        'fade-in-right': 'fadeInRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) both',
                        'float': 'float 6s ease-in-out infinite',
                        'blob': 'blob 15s ease-in-out infinite',
                        'gradient': 'gradient 6s ease infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(24px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeInDown: {
                            '0%': { opacity: '0', transform: 'translateY(-24px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeInRight: {
                            '0%': { opacity: '0', transform: 'translateX(24px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-15px)' },
                        },
                        blob: {
                            '0%, 100%': { transform: 'translate(0, 0) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                        },
                        gradient: {
                            '0%, 100%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* ============================================
           BASE
           ============================================ */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        html {
            scroll-behavior: smooth;
            overflow-x: hidden;
        }
        body {
            overflow-x: hidden;
            max-width: 100vw;
        }

        body.gradient-bg {
            background: #00050d;
            background-image:
                radial-gradient(at 15% 5%, rgba(0, 128, 255, 0.18) 0px, transparent 45%),
                radial-gradient(at 85% 10%, rgba(77, 190, 77, 0.14) 0px, transparent 45%),
                radial-gradient(at 5% 55%, rgba(0, 128, 255, 0.10) 0px, transparent 45%),
                radial-gradient(at 95% 65%, rgba(77, 190, 77, 0.10) 0px, transparent 45%),
                radial-gradient(at 50% 100%, rgba(0, 128, 255, 0.16) 0px, transparent 50%);
            background-attachment: fixed;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.018) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.018) 1px, transparent 1px);
            background-size: 64px 64px;
            pointer-events: none;
            z-index: 0;
            mask-image: radial-gradient(ellipse at center, black 30%, transparent 80%);
            -webkit-mask-image: radial-gradient(ellipse at center, black 30%, transparent 80%);
        }

        /* ============================================
           TYPEWRITER
           ============================================ */
        .typewriter-cursor {
            display: inline-block;
            width: 3px;
            height: 0.85em;
            background: linear-gradient(180deg, #4db3ff, #4dbe4d);
            margin-left: 4px;
            vertical-align: baseline;
            border-radius: 2px;
            animation: blink 0.9s step-end infinite;
            box-shadow: 0 0 8px rgba(77, 190, 77, 0.6);
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* ============================================
           GLASS
           ============================================ */
        .glass-card {
            background: rgba(10, 18, 32, 0.55);
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow:
                0 30px 60px -20px rgba(0, 0, 0, 0.6),
                0 0 0 1px rgba(255, 255, 255, 0.03) inset;
        }
        .glass-soft {
            background: rgba(255, 255, 255, 0.035);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.07);
        }
        .glass-strong {
            background: rgba(5, 15, 30, 0.75);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* ============================================
           NAVBAR
           ============================================ */
        .navbar { transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
        .navbar.scrolled {
            background: rgba(0, 5, 13, 0.85);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        /* ============================================
           BOTONES
           ============================================ */
        .btn-primary {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #0080ff 0%, #4dbe4d 100%);
            background-size: 200% 200%;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .btn-primary:hover:not(:disabled) {
            background-position: 100% 50%;
            transform: translateY(-2px);
            box-shadow: 0 20px 40px -12px rgba(0, 128, 255, 0.55);
        }
        .btn-primary:active:not(:disabled) { transform: translateY(0); }
        .btn-primary:disabled { opacity: 0.75; cursor: not-allowed; }
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s ease;
        }
        .btn-primary:hover:not(:disabled)::before { left: 100%; }

        .btn-danger {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px -8px rgba(220, 38, 38, 0.55);
        }

        /* ============================================
           GRADIENT TEXT
           ============================================ */
        .text-gradient {
            background: linear-gradient(135deg, #4db3ff 0%, #71cb71 50%, #4db3ff 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient 5s linear infinite;
        }

        /* ============================================
           BLOBS
           ============================================ */
        .blobs-wrapper {
            position: fixed;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
            pointer-events: none;
            opacity: 0.4;
        }
        .blob-1 {
            width: 450px; height: 450px;
            background: #0080ff;
            top: -150px; left: -150px;
            animation: blob 16s ease-in-out infinite;
        }
        .blob-2 {
            width: 400px; height: 400px;
            background: #4dbe4d;
            bottom: -120px; right: -120px;
            animation: blob 20s ease-in-out infinite reverse;
        }

        /* ============================================
           PARTICLES
           ============================================ */
        .particles {
            position: fixed;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }
        .particle {
            position: absolute;
            width: 2px; height: 2px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: floatParticle linear infinite;
        }
        @keyframes floatParticle {
            0% { transform: translateY(100vh); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh); opacity: 0; }
        }

        /* ============================================
           CURSOR GLOW
           ============================================ */
        .cursor-glow {
            position: fixed;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 128, 255, 0.12) 0%, transparent 70%);
            pointer-events: none;
            z-index: 1;
            transform: translate(-50%, -50%);
            transition: opacity 0.3s ease;
            opacity: 0;
            mix-blend-mode: screen;
        }
        @media (min-width: 1024px) {
            .cursor-glow.active { opacity: 1; }
        }

        /* ============================================
           STAT CARDS
           ============================================ */
        .stat-card {
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 50px -15px rgba(0, 128, 255, 0.4);
            border-color: rgba(0, 128, 255, 0.3);
        }

        /* ============================================
           PROGRESS BAR (animada)
           ============================================ */
        .progress-fill {
            transition: width 1.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* ============================================
           PROGRESS RING SVG
           ============================================ */
        .progress-ring {
            transform: rotate(-90deg);
        }
        .progress-ring-circle {
            transition: stroke-dashoffset 1.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* ============================================
           QUICK ACTION
           ============================================ */
        .quick-action {
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .quick-action:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(4px);
        }
        .quick-action:hover .quick-arrow {
            transform: translateX(4px);
        }
        .quick-arrow { transition: transform 0.3s ease; }

        /* ============================================
           RIASEC BARS
           ============================================ */
        .riasec-row {
            transition: all 0.3s ease;
        }
        .riasec-row:hover {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 0.5rem;
        }

        /* ============================================
           SCROLLBAR
           ============================================ */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #00050d; }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #0080ff, #4dbe4d);
            border-radius: 10px;
        }
        ::selection {
            background: rgba(0, 128, 255, 0.4);
            color: white;
        }

        /* ============================================
           ANIMATION DELAYS
           ============================================ */
        .d-100 { animation-delay: 100ms; }
        .d-200 { animation-delay: 200ms; }
        .d-300 { animation-delay: 300ms; }
        .d-400 { animation-delay: 400ms; }
        .d-500 { animation-delay: 500ms; }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .blobs-wrapper, .particles, .cursor-glow { display: none !important; }
            body::before { background-size: 40px 40px; }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen font-sans text-white antialiased">

    <!-- Cursor Glow -->
    <div class="cursor-glow" id="cursorGlow"></div>

    <!-- Background Blobs -->
    <div class="blobs-wrapper">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
    </div>

    <!-- Particles -->
    <div class="particles" id="particles"></div>

    <!-- ============================================
         NAVBAR
         ============================================ -->
    <header id="navbar" class="navbar fixed top-0 left-0 right-0 z-50 py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">

            <!-- Logo -->
            <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 group">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-lg shadow-tec-500/30 group-hover:scale-105 transition-transform duration-300">
                    <i class="fas fa-graduation-cap text-lg text-white"></i>
                </div>
                <div class="hidden sm:block">
                    <h1 class="text-base font-bold font-display tracking-tight leading-tight">Inspiratec</h1>
                    <p class="text-[10px] uppercase tracking-widest text-tec-300 font-medium leading-tight">TESVB · Valle de Bravo</p>
                </div>
            </a>

            <!-- User + Logout -->
            <div class="flex items-center gap-3">
                <!-- User chip -->
                <div class="hidden md:flex items-center gap-3 px-3 py-1.5 rounded-full glass-soft">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-md">
                        <span class="text-white font-bold text-xs">{{ substr(auth()->user()->nombre ?? auth()->user()->name, 0, 1) }}</span>
                    </div>
                    <div class="pr-1">
                        <p class="text-xs font-semibold leading-tight">{{ auth()->user()->nombre ?? auth()->user()->name }}</p>
                        <p class="text-[10px] text-tec-300 leading-tight">{{ ucfirst(auth()->user()->rol ?? 'Estudiante') }}</p>
                    </div>
                </div>

                <!-- Mobile avatar only -->
                <div class="md:hidden w-9 h-9 rounded-full bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-md">
                    <span class="text-white font-bold text-sm">{{ substr(auth()->user()->nombre ?? auth()->user()->name, 0, 1) }}</span>
                </div>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="btn-danger inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-semibold text-white shadow-lg">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hidden sm:inline">Salir</span>
                    </button>
                </form>
            </div>

        </div>
    </header>

    <!-- ============================================
         MAIN
         ============================================ -->
    <main class="container mx-auto px-4 pt-28 pb-10 relative z-10">

        <!-- ============================================
             HERO — BIENVENIDA
             ============================================ -->
        <section class="glass-card rounded-3xl p-7 sm:p-10 mb-8 animate-fade-in-up relative overflow-hidden">
            <!-- Decoración interna -->
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-tec-500 rounded-full blur-3xl opacity-15"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-valle-500 rounded-full blur-3xl opacity-15"></div>

            <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="text-center lg:text-left flex-1">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full glass-soft mb-4 text-[11px] font-medium">
                        <span class="w-1.5 h-1.5 rounded-full bg-valle-400 animate-pulse"></span>
                        <span class="tracking-wide text-gray-300">Panel del estudiante</span>
                    </div>

                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-display mb-3 tracking-tight leading-tight">
                        ¡Bienvenido,
                        <span class="text-gradient">
                            {{ auth()->user()->nombre ?? auth()->user()->name }}
                        </span>!
                    </h2>

                    <p class="text-base sm:text-lg text-gray-300 max-w-2xl leading-relaxed mb-6">
                        Descubre tu verdadera vocación profesional con el test basado en el modelo
                        <span class="text-white font-semibold">RIASEC</span>.
                    </p>

                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-x-6 gap-y-2 text-sm text-gray-400">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-compass text-tec-400"></i>
                            <span>Modelo RIASEC</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-shield-halved text-valle-400"></i>
                            <span>Resultados confidenciales</span>
                        </div>
                    </div>
                </div>

                <!-- Icono flotante decorativo -->
                <div class="hidden lg:flex flex-shrink-0">
                    <div class="w-32 h-32 rounded-3xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-2xl shadow-tec-500/40 animate-float">
                        <i class="fas fa-rocket text-5xl text-white"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================
             GRID PRINCIPAL
             ============================================ -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- ==========================================
                 COLUMNA IZQUIERDA (2/3)
                 ========================================== -->
            <div class="lg:col-span-2 space-y-6">

                @if($test && $test->estado == 'en_proceso')
                <!-- ============================
                     TEST EN PROGRESO
                     ============================ -->
                @php
                    $totalPreguntas = \App\Models\Pregunta::count();
                    $respuestasContestadas = $test->pregunta_actual ?? 0;
                    $porcentajeProgreso = $totalPreguntas > 0 ? round(($respuestasContestadas / $totalPreguntas) * 100) : 0;
                    // Circunferencia del ring SVG (r=45)
                    $circunferencia = 2 * M_PI * 45;
                    $offset = $circunferencia - ($porcentajeProgreso / 100) * $circunferencia;
                @endphp

                <div class="glass-card rounded-3xl p-7 sm:p-9 animate-fade-in-up d-100 relative overflow-hidden">
                    <div class="absolute -top-20 -right-20 w-56 h-56 bg-valle-500 rounded-full blur-3xl opacity-10"></div>

                    <div class="relative z-10">
                        <!-- Header -->
                        <div class="flex items-center justify-between mb-6 flex-wrap gap-4">
                            <div>
                                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full glass-soft mb-3 text-[11px] font-medium">
                                    <span class="w-1.5 h-1.5 rounded-full bg-valle-400 animate-pulse"></span>
                                    <span class="tracking-wide text-valle-300">EN PROGRESO</span>
                                </div>
                                <h3 class="text-2xl font-bold font-display mb-1 flex items-center gap-3">
                                    <i class="fas fa-play-circle text-valle-400"></i>
                                    Test en curso
                                </h3>
                                <p class="text-sm text-gray-400">Continúa donde lo dejaste</p>
                            </div>
                            <div class="text-right">
                                <p class="text-[11px] uppercase tracking-wider text-gray-500 mb-1">Iniciado el</p>
                                <p class="text-sm font-semibold text-gray-200">
                                    {{ \Carbon\Carbon::parse($test->fecha_inicio)->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>

                        <!-- Progress + Ring -->
                        <div class="grid grid-cols-1 sm:grid-cols-[auto_1fr] gap-6 items-center mb-7">
                            <!-- Ring SVG -->
                            <div class="flex justify-center">
                                <div class="relative w-32 h-32">
                                    <svg class="progress-ring w-32 h-32" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="45" stroke="rgba(255,255,255,0.06)" stroke-width="8" fill="none"/>
                                        <circle cx="50" cy="50" r="45"
                                                stroke="url(#ringGradient)"
                                                stroke-width="8" fill="none" stroke-linecap="round"
                                                stroke-dasharray="{{ $circunferencia }}"
                                                stroke-dashoffset="{{ $offset }}"
                                                class="progress-ring-circle"/>
                                        <defs>
                                            <linearGradient id="ringGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" stop-color="#4db3ff"/>
                                                <stop offset="100%" stop-color="#4dbe4d"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                                        <span class="text-2xl font-extrabold font-display text-gradient">{{ $porcentajeProgreso }}%</span>
                                        <span class="text-[10px] uppercase tracking-wider text-gray-500">Completado</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Info -->
                            <div>
                                <div class="mb-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-sm font-semibold text-gray-200">Progreso del test</span>
                                        <span class="text-sm font-bold text-valle-300">{{ $respuestasContestadas }}/{{ $totalPreguntas }}</span>
                                    </div>
                                    <div class="w-full bg-white/5 rounded-full h-2 overflow-hidden">
                                        <div class="progress-fill bg-gradient-to-r from-tec-500 to-valle-500 h-2 rounded-full" data-width="{{ $porcentajeProgreso }}%" style="width: 0%"></div>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 leading-relaxed">
                                    <i class="fas fa-info-circle text-tec-400 mr-1"></i>
                                    Tus respuestas están guardadas. Puedes continuar cuando quieras.
                                </p>
                            </div>
                        </div>

                        <!-- Botón continuar -->
                        <a href="{{ route('test.question', ['test'=>$test->id_test, 'index'=>$respuestasContestadas]) }}"
                           class="btn-primary w-full text-center py-4 rounded-xl font-bold text-base shadow-2xl shadow-tec-500/30 block">
                            <span class="relative z-10 inline-flex items-center justify-center gap-2">
                                <i class="fas fa-play"></i>
                                Continuar test vocacional
                            </span>
                        </a>
                    </div>
                </div>

                @else
                <!-- ============================
                     INICIAR NUEVO TEST
                     ============================ -->
                <div class="glass-card rounded-3xl p-7 sm:p-9 animate-fade-in-up d-100 relative overflow-hidden">
                    <div class="absolute -top-20 -right-20 w-56 h-56 bg-tec-500 rounded-full blur-3xl opacity-10"></div>

                    <div class="relative z-10">
                        <!-- Header -->
                        <div class="text-center mb-7">
                            <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-gradient-to-br from-tec-500 to-valle-500 mb-5 shadow-2xl shadow-tec-500/40">
                                <i class="fas fa-brain text-3xl text-white"></i>
                            </div>
                            <h3 class="text-2xl sm:text-3xl font-bold font-display mb-2">
                                Test Vocacional RIASEC
                            </h3>
                            <p class="text-gray-400 text-sm">
                                42 preguntas · 15-20 minutos
                            </p>
                        </div>

                        <!-- Stats grid -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-7">
                            <div class="glass-soft rounded-2xl p-4 text-center">
                                <div class="text-2xl font-extrabold font-display text-gradient mb-1">42</div>
                                <div class="text-[10px] uppercase tracking-wider text-gray-500">Preguntas</div>
                            </div>
                            <div class="glass-soft rounded-2xl p-4 text-center">
                                <div class="text-2xl font-extrabold font-display text-gradient mb-1">6</div>
                                <div class="text-[10px] uppercase tracking-wider text-gray-500">Dimensiones</div>
                            </div>
                            <div class="glass-soft rounded-2xl p-4 text-center">
                                <div class="text-2xl font-extrabold font-display text-gradient mb-1">15-20</div>
                                <div class="text-[10px] uppercase tracking-wider text-gray-500">Minutos</div>
                            </div>
                            <div class="glass-soft rounded-2xl p-4 text-center">
                                <div class="text-2xl font-extrabold font-display text-gradient mb-1">100%</div>
                                <div class="text-[10px] uppercase tracking-wider text-gray-500">Científico</div>
                            </div>
                        </div>

                        <!-- Features -->
                        <div class="space-y-2.5 mb-7">
                            <div class="flex items-center gap-3 text-sm text-gray-300">
                                <div class="w-6 h-6 rounded-lg bg-tec-500/15 border border-tec-500/25 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-check text-[10px] text-tec-400"></i>
                                </div>
                                <span>Sin respuestas correctas ni incorrectas</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm text-gray-300">
                                <div class="w-6 h-6 rounded-lg bg-valle-500/15 border border-valle-500/25 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-check text-[10px] text-valle-400"></i>
                                </div>
                                <span>Puedes pausar y continuar cuando quieras</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm text-gray-300">
                                <div class="w-6 h-6 rounded-lg bg-tec-500/15 border border-tec-500/25 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-check text-[10px] text-tec-400"></i>
                                </div>
                                <span>Recibirás tu perfil personalizado al final</span>
                            </div>
                        </div>

                        <!-- Botón iniciar -->
                        <form action="{{ route('test.start') }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="btn-primary w-full py-4 rounded-xl font-bold text-base shadow-2xl shadow-tec-500/30">
                                <span class="relative z-10 inline-flex items-center justify-center gap-2">
                                    <i class="fas fa-play-circle"></i>
                                    Iniciar test vocacional
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
                @endif

                <!-- ============================
                     STATS CARDS
                     ============================ -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 animate-fade-in-up d-200">
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

                    <div class="stat-card glass-card rounded-2xl p-6">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-11 h-11 rounded-xl bg-tec-500/15 border border-tec-500/25 flex items-center justify-center">
                                <i class="fas fa-check-circle text-tec-400"></i>
                            </div>
                            <i class="fas fa-arrow-trend-up text-gray-600 text-xs"></i>
                        </div>
                        <p class="text-[11px] uppercase tracking-wider text-gray-500 mb-1">Tests completados</p>
                        <p class="text-3xl font-extrabold font-display text-gradient mb-1">{{ $testsCompletados }}</p>
                        <p class="text-xs text-gray-500">de {{ $testsTotales }} {{ $testsTotales === 1 ? 'test' : 'tests' }}</p>
                    </div>

                    <div class="stat-card glass-card rounded-2xl p-6">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-11 h-11 rounded-xl bg-valle-500/15 border border-valle-500/25 flex items-center justify-center">
                                <i class="fas fa-chart-bar text-valle-400"></i>
                            </div>
                            <i class="fas fa-arrow-trend-up text-gray-600 text-xs"></i>
                        </div>
                        <p class="text-[11px] uppercase tracking-wider text-gray-500 mb-1">Puntuación máxima</p>
                        <p class="text-3xl font-extrabold font-display text-gradient mb-1">{{ $puntuacionMaxima }}</p>
                        <p class="text-xs text-gray-500">último test</p>
                    </div>

                    <div class="stat-card glass-card rounded-2xl p-6">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-11 h-11 rounded-xl bg-tec-500/15 border border-tec-500/25 flex items-center justify-center">
                                <i class="fas fa-trophy text-tec-400"></i>
                            </div>
                            <i class="fas fa-arrow-trend-up text-gray-600 text-xs"></i>
                        </div>
                        <p class="text-[11px] uppercase tracking-wider text-gray-500 mb-1">Perfil dominante</p>
                        <p class="text-3xl font-extrabold font-display text-gradient mb-1">
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
                                —
                            @endif
                        </p>
                        <p class="text-xs text-gray-500">último resultado</p>
                    </div>
                </div>

            </div>

            <!-- ==========================================
                 COLUMNA DERECHA (1/3)
                 ========================================== -->
            <div class="space-y-6">

                <!-- ACCIONES RÁPIDAS -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up d-200">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-9 h-9 rounded-xl bg-valle-500/15 border border-valle-500/25 flex items-center justify-center">
                            <i class="fas fa-bolt text-valle-400 text-sm"></i>
                        </div>
                        <h3 class="text-base font-bold font-display">Acciones rápidas</h3>
                    </div>

                    <div class="space-y-2">
                        <a href="{{ route('test.history') }}"
                           class="quick-action flex items-center justify-between p-3.5 rounded-xl bg-white/[0.03] border border-white/5">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-lg bg-tec-500/15 border border-tec-500/25 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-history text-tec-400 text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-white leading-tight">Historial</p>
                                    <p class="text-[10px] text-gray-500 leading-tight">Ver resultados anteriores</p>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-tec-400 text-xs quick-arrow"></i>
                        </a>
                    </div>
                </div>

                <!-- PERFIL RIASEC -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up d-300">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-9 h-9 rounded-xl bg-tec-500/15 border border-tec-500/25 flex items-center justify-center">
                            <i class="fas fa-chart-pie text-tec-400 text-sm"></i>
                        </div>
                        <h3 class="text-base font-bold font-display">Tu perfil RIASEC</h3>
                    </div>

                    @if($ultimoResultado)
                    <div class="space-y-3">
                        @php
                            $dimensions = [
                                ['key'=>'R','label' => 'Realista', 'color' => 'from-red-500 to-red-600', 'puntos' => $ultimoResultado->resultado->puntos_R ?? 0, 'letter_color' => 'text-red-400'],
                                ['key'=>'I','label' => 'Investigador', 'color' => 'from-blue-500 to-blue-600', 'puntos' => $ultimoResultado->resultado->puntos_I ?? 0, 'letter_color' => 'text-blue-400'],
                                ['key'=>'A','label' => 'Artístico', 'color' => 'from-purple-500 to-purple-600', 'puntos' => $ultimoResultado->resultado->puntos_A ?? 0, 'letter_color' => 'text-purple-400'],
                                ['key'=>'S','label' => 'Social', 'color' => 'from-green-500 to-green-600', 'puntos' => $ultimoResultado->resultado->puntos_S ?? 0, 'letter_color' => 'text-green-400'],
                                ['key'=>'E','label' => 'Emprendedor', 'color' => 'from-yellow-500 to-yellow-600', 'puntos' => $ultimoResultado->resultado->puntos_E ?? 0, 'letter_color' => 'text-yellow-400'],
                                ['key'=>'C','label' => 'Convencional', 'color' => 'from-indigo-500 to-indigo-600', 'puntos' => $ultimoResultado->resultado->puntos_C ?? 0, 'letter_color' => 'text-indigo-400'],
                            ];
                            $maxPuntos = max(1, collect($dimensions)->max('puntos'));
                            $dimensions = collect($dimensions)->map(function($dim) use ($maxPuntos) {
                                $dim['porcentaje'] = round(($dim['puntos'] / $maxPuntos) * 100);
                                return $dim;
                            })->toArray();
                        @endphp

                        @foreach($dimensions as $dim)
                        <div class="riasec-row flex items-center gap-3 py-1.5 px-2 -mx-2">
                            <div class="w-7 h-7 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center flex-shrink-0">
                                <span class="text-xs font-extrabold {{ $dim['letter_color'] }}">{{ $dim['key'] }}</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <span class="text-xs font-medium text-gray-300 truncate">{{ $dim['label'] }}</span>
                                    <span class="text-xs font-bold text-white ml-2">{{ $dim['puntos'] }}</span>
                                </div>
                                <div class="w-full bg-white/5 rounded-full h-1.5 overflow-hidden">
                                    <div class="progress-fill h-1.5 rounded-full bg-gradient-to-r {{ $dim['color'] }}" data-width="{{ $dim['porcentaje'] }}%" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="flex items-center gap-2 pt-3 mt-3 border-t border-white/5 text-[10px] text-gray-500">
                            <i class="fas fa-info-circle text-tec-400"></i>
                            <span>Puntuación máxima por categoría: 7 puntos</span>
                        </div>
                    </div>
                    @else
                    <div class="text-center py-8">
                        <div class="w-14 h-14 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-clipboard-question text-gray-500 text-lg"></i>
                        </div>
                        <h4 class="text-sm font-semibold text-white mb-1">Sin resultados aún</h4>
                        <p class="text-xs text-gray-500 leading-relaxed max-w-[200px] mx-auto">
                            Completa tu primer test para ver tu perfil RIASEC
                        </p>
                    </div>
                    @endif
                </div>

                <!-- TIP DEL DÍA -->
                <div class="glass-card rounded-2xl p-6 animate-fade-in-up d-400 relative overflow-hidden">
                    <div class="absolute -top-12 -right-12 w-32 h-32 bg-yellow-500 rounded-full blur-3xl opacity-10"></div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-9 h-9 rounded-xl bg-yellow-500/15 border border-yellow-500/25 flex items-center justify-center">
                                <i class="fas fa-lightbulb text-yellow-400 text-sm"></i>
                            </div>
                            <h3 class="text-base font-bold font-display">Tip del día</h3>
                        </div>
                        <p class="text-sm text-gray-300 italic leading-relaxed">
                            <i class="fas fa-quote-left text-yellow-400/40 text-xs mr-1"></i>
                            El 85% de las personas que realizan tests vocacionales toman decisiones más acertadas sobre su carrera profesional. ¡Completa tu test para descubrir tu verdadero potencial!
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </main>

    <!-- ============================================
         FOOTER
         ============================================ -->
    <footer class="relative z-10 mt-12 border-t border-white/5">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-lg shadow-tec-500/30">
                        <i class="fas fa-graduation-cap text-white text-sm"></i>
                    </div>
                    <div>
                        <p class="text-base font-bold font-display leading-tight">Inspiratec</p>
                        <p class="text-[10px] uppercase tracking-widest text-tec-300 leading-tight">TESVB · Valle de Bravo</p>
                    </div>
                </div>
                <div class="text-center md:text-right">
                    <p class="text-xs text-gray-500">© {{ date('Y') }} Tecnológico de Estudios Superiores de Valle de Bravo</p>
                    <p class="text-[10px] text-gray-600 mt-1">Plataforma de Orientación Vocacional RIASEC</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- ============================================
         JAVASCRIPT
         ============================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            'use strict';

            /* ============================================
               NAVBAR SCROLL
               ============================================ */
            const navbar = document.getElementById('navbar');
            let ticking = false;

            function handleScroll() {
                if (window.scrollY > 30) navbar.classList.add('scrolled');
                else navbar.classList.remove('scrolled');
                ticking = false;
            }

            window.addEventListener('scroll', () => {
                if (!ticking) {
                    window.requestAnimationFrame(handleScroll);
                    ticking = true;
                }
            }, { passive: true });

            handleScroll();

            /* ============================================
               PROGRESS BARS ANIMADAS
               ============================================ */
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const targetWidth = bar.dataset.width || '0%';
                setTimeout(() => {
                    bar.style.width = targetWidth;
                }, 300);
            });

            /* ============================================
               PARTICLES
               ============================================ */
            const particlesContainer = document.getElementById('particles');
            if (particlesContainer && window.innerWidth > 768) {
                for (let i = 0; i < 22; i++) {
                    const p = document.createElement('div');
                    p.className = 'particle';
                    p.style.left = Math.random() * 100 + '%';
                    p.style.animationDuration = (15 + Math.random() * 25) + 's';
                    p.style.animationDelay = (Math.random() * 15) + 's';
                    p.style.opacity = 0.2 + Math.random() * 0.5;
                    particlesContainer.appendChild(p);
                }
            }

            /* ============================================
               CURSOR GLOW
               ============================================ */
            const cursorGlow = document.getElementById('cursorGlow');
            if (cursorGlow && window.innerWidth > 1024) {
                let cursorTimeout;
                document.addEventListener('mousemove', (e) => {
                    cursorGlow.style.left = e.clientX + 'px';
                    cursorGlow.style.top = e.clientY + 'px';
                    cursorGlow.classList.add('active');
                    clearTimeout(cursorTimeout);
                    cursorTimeout = setTimeout(() => {
                        cursorGlow.classList.remove('active');
                    }, 2000);
                });
            }

        });
    </script>
</body>
</html>