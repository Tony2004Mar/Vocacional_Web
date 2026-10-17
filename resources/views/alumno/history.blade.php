<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Historial · Inspiratec | TESVB Valle de Bravo</title>
    <meta name="description" content="Historial de tests vocacionales realizados en Inspiratec.">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        'fade-in-up': 'fadeInUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) both',
                        'fade-in-down': 'fadeInDown 0.7s cubic-bezier(0.16, 1, 0.3, 1) both',
                        'float': 'float 6s ease-in-out infinite',
                        'blob': 'blob 15s ease-in-out infinite',
                        'gradient': 'gradient 6s ease infinite',
                        'pulse-soft': 'pulseSoft 2s ease-in-out infinite',
                        'spin-slow': 'spin 20s linear infinite',
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
                        },
                        pulseSoft: {
                            '0%, 100%': { transform: 'scale(1)', opacity: '1' },
                            '50%': { transform: 'scale(1.05)', opacity: '0.85' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-tap-highlight-color: transparent;
        }
        html { scroll-behavior: smooth; overflow-x: hidden; }
        body { overflow-x: hidden; max-width: 100vw; }

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

        .navbar { transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
        .navbar.scrolled {
            background: rgba(0, 5, 13, 0.85);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .text-gradient {
            background: linear-gradient(135deg, #4db3ff 0%, #71cb71 50%, #4db3ff 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient 5s linear infinite;
        }

        .glass-soft {
            background: rgba(255, 255, 255, 0.035);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.07);
        }
        .glass-card {
            background: rgba(10, 18, 32, 0.55);
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 30px 60px -20px rgba(0, 0, 0, 0.6);
        }

        .test-card {
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }
        .test-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(135deg, transparent, rgba(255,255,255,0.15), transparent);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }
        .test-card:hover::before { opacity: 1; }
        .test-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px -20px rgba(0, 128, 255, 0.4);
            border-color: rgba(0, 128, 255, 0.3);
        }

        .badge {
            padding: 0.375rem 0.75rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.6875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }
        .badge-completed {
            background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
            box-shadow: 0 4px 12px -4px rgba(34, 197, 94, 0.5);
        }
        .badge-progress {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            box-shadow: 0 4px 12px -4px rgba(245, 158, 11, 0.5);
        }

        .riasec-badge {
            padding: 0.5rem 0.875rem;
            border-radius: 12px;
            font-weight: 800;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 2.5rem;
            box-shadow: 0 4px 12px -4px rgba(0, 0, 0, 0.4);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .riasec-R { background: linear-gradient(135deg, #ef4444, #dc2626); }
        .riasec-I { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .riasec-A { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
        .riasec-S { background: linear-gradient(135deg, #10b981, #059669); }
        .riasec-E { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .riasec-C { background: linear-gradient(135deg, #6366f1, #4f46e5); }

        .mini-chart-container {
            position: relative;
            height: 130px;
            width: 100%;
        }

        .btn-download {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            color: white;
            padding: 9px 14px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: none;
            cursor: pointer;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .btn-download:hover:not(:disabled) {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 12px 25px -8px rgba(16, 185, 129, 0.6);
        }
        .btn-download:active:not(:disabled) { transform: scale(0.98); }
        .btn-download:disabled { opacity: 0.5; cursor: not-allowed; }
        .btn-download-loading { opacity: 0.7; pointer-events: none; }

        .btn-download-disabled {
            background: rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.3);
            cursor: not-allowed;
            padding: 9px 14px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            justify-content: center;
        }

        .btn-survey {
            background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            color: white;
            padding: 9px 14px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: none;
            cursor: pointer;
            justify-content: center;
            position: relative;
            overflow: hidden;
            text-decoration: none;
        }
        .btn-survey:hover {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 12px 25px -8px rgba(139, 92, 246, 0.6);
            color: white;
        }

        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 5, 13, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            padding: 1rem;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .modal-overlay.active { opacity: 1; visibility: visible; }

        .modal-content {
            background: rgba(10, 18, 32, 0.95);
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            border-radius: 1.75rem;
            padding: 2rem;
            max-width: 440px;
            width: 100%;
            transform: scale(0.85) translateY(20px);
            transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.9);
        }
        .modal-overlay.active .modal-content {
            transform: scale(1) translateY(0);
        }

        .notification {
            position: fixed;
            top: 5rem;
            right: 1.25rem;
            z-index: 2000;
            padding: 0.875rem 1.125rem;
            border-radius: 1rem;
            font-weight: 500;
            font-size: 0.875rem;
            transform: translateX(120%);
            transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            max-width: 380px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }
        .notification::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;
            background: rgba(255,255,255,0.4);
            animation: progressShrink 4s linear forwards;
        }
        @keyframes progressShrink {
            from { transform: scaleX(1); transform-origin: left; }
            to { transform: scaleX(0); transform-origin: left; }
        }
        .notification.show { transform: translateX(0); }

        .notification-success {
            background: rgba(16, 185, 129, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: white;
        }
        .notification-error {
            background: rgba(239, 68, 68, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: white;
        }
        .notification-info {
            background: rgba(0, 128, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: white;
        }

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

        .d-100 { animation-delay: 100ms; }
        .d-200 { animation-delay: 200ms; }
        .d-300 { animation-delay: 300ms; }

        @media (max-width: 768px) {
            .blobs-wrapper, .particles { display: none !important; }
            body::before { background-size: 40px 40px; }
            .notification { top: 4rem; right: 0.75rem; left: 0.75rem; max-width: none; }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen font-sans text-white antialiased">

    @php
        $totalCompletados = $tests->filter(fn($t) => $t->estado && $t->estado->nombre === 'finalizado')->count();
        $totalEnProgreso = $tests->filter(fn($t) => $t->estado && $t->estado->nombre === 'en_progreso')->count();
        $totalTests = $tests->count();
        $primeraFecha = $tests->min('fecha_inicio');
        $diasSeguimiento = $primeraFecha ? now()->diffInDays($primeraFecha) : 0;
    @endphp

    <div class="blobs-wrapper">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
    </div>
    <div class="particles" id="particles"></div>

    <!-- MODAL ELIMINAR -->
    <div id="deleteModal" class="modal-overlay">
        <div class="modal-content">
            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-red-500/15 border border-red-500/30 mb-5">
                    <i class="fas fa-exclamation-triangle text-red-400 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold font-display mb-2">¿Eliminar este test?</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Esta acción no se puede deshacer. Se eliminarán todos los datos asociados a este test.
                </p>
            </div>
            <div class="flex gap-3">
                <button id="cancelDelete" class="flex-1 glass-soft hover:bg-white/10 py-3 rounded-xl font-semibold text-sm transition-all duration-300">
                    Cancelar
                </button>
                <button id="confirmDelete" class="flex-1 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 py-3 rounded-xl font-bold text-sm transition-all duration-300 shadow-lg shadow-red-500/25">
                    <i class="fas fa-trash mr-2"></i>Eliminar
                </button>
            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <header id="navbar" class="navbar fixed top-0 left-0 right-0 z-50 py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('estudiante.home') }}" class="flex items-center gap-3 group">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-lg shadow-tec-500/30 group-hover:scale-105 transition-transform duration-300">
                    <i class="fas fa-arrow-left text-white"></i>
                </div>
                <div class="hidden sm:block">
                    <h1 class="text-base font-bold font-display tracking-tight leading-tight">Inspiratec</h1>
                    <p class="text-[10px] uppercase tracking-widest text-tec-300 font-medium leading-tight">Historial de tests</p>
                </div>
            </a>

            <div class="flex items-center gap-3">
                <a href="{{ route('estudiante.home') }}"
                   class="hidden md:inline-flex items-center gap-2 px-4 py-2 rounded-xl glass-soft hover:bg-white/10 text-xs font-medium text-gray-300 hover:text-white transition-all duration-300">
                    <i class="fas fa-home text-tec-400"></i>
                    <span>Dashboard</span>
                </a>

                <div class="hidden md:flex items-center gap-3 px-3 py-1.5 rounded-full glass-soft">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-md">
                        <span class="text-white font-bold text-xs">{{ substr(auth()->user()->nombre ?? auth()->user()->name, 0, 1) }}</span>
                    </div>
                    <div class="pr-1">
                        <p class="text-xs font-semibold leading-tight">{{ auth()->user()->nombre ?? auth()->user()->name }}</p>
                        <p class="text-[10px] text-tec-300 leading-tight">{{ $totalTests }} {{ $totalTests === 1 ? 'test' : 'tests' }}</p>
                    </div>
                </div>

                <div class="md:hidden w-9 h-9 rounded-full bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-md">
                    <span class="text-white font-bold text-sm">{{ substr(auth()->user()->nombre ?? auth()->user()->name, 0, 1) }}</span>
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN -->
    <main class="container mx-auto px-4 pt-28 pb-16 relative z-10">

        <!-- HERO -->
        <section class="text-center mb-12 animate-fade-in-down">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-soft mb-5 text-xs font-medium">
                <span class="w-1.5 h-1.5 rounded-full bg-valle-400 animate-pulse"></span>
                <span class="text-gray-300">Historial personal</span>
            </div>

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold font-display mb-4 tracking-tight leading-tight">
                Tu <span class="text-gradient">historial</span>
            </h1>
            <p class="text-base md:text-lg text-gray-400 max-w-2xl mx-auto leading-relaxed">
                Revisa todos tus tests vocacionales realizados y consulta tus resultados detallados.
            </p>

            <div class="inline-flex items-center gap-2 mt-5 px-3 py-1.5 rounded-full glass-soft text-xs text-gray-400">
                <i class="fas fa-file-pdf text-valle-400"></i>
                <span>Los tests completados tienen reporte PDF disponible</span>
            </div>
        </section>

        @if($tests->isEmpty())
        <section class="max-w-2xl mx-auto scroll-animate">
            <div class="glass-card rounded-3xl p-10 sm:p-14 text-center relative overflow-hidden">
                <div class="absolute -top-20 -right-20 w-52 h-52 bg-tec-500 rounded-full blur-3xl opacity-15"></div>
                <div class="absolute -bottom-20 -left-20 w-52 h-52 bg-valle-500 rounded-full blur-3xl opacity-15"></div>

                <div class="relative z-10">
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-3xl bg-gradient-to-br from-tec-500 to-valle-500 mb-6 shadow-2xl shadow-tec-500/40 animate-float">
                        <i class="fas fa-clipboard-list text-4xl text-white"></i>
                    </div>

                    <h3 class="text-2xl md:text-3xl font-bold font-display mb-3">Aún no hay tests</h3>
                    <p class="text-gray-400 mb-8 max-w-md mx-auto leading-relaxed">
                        Todavía no has completado ningún test vocacional. Comienza tu viaje de autodescubrimiento ahora mismo.
                    </p>

                    <a href="{{ route('estudiante.home') }}"
                       class="inline-flex items-center gap-2 px-8 py-4 rounded-2xl font-bold text-white bg-gradient-to-r from-tec-500 to-valle-500 hover:from-tec-600 hover:to-valle-600 shadow-2xl shadow-tec-500/30 hover:scale-105 transition-all duration-300">
                        <i class="fas fa-rocket"></i>
                        Realizar mi primer test
                    </a>
                </div>
            </div>
        </section>
        @else

        <!-- STATS SUMMARY -->
        <section class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10 animate-fade-in-up">
            <div class="glass-card rounded-2xl p-5 relative overflow-hidden">
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-valle-500 rounded-full blur-3xl opacity-15"></div>
                <div class="relative z-10">
                    <div class="w-10 h-10 rounded-xl bg-valle-500/15 border border-valle-500/25 flex items-center justify-center mb-3">
                        <i class="fas fa-check-circle text-valle-400 text-sm"></i>
                    </div>
                    <p id="stats-completed" class="text-3xl font-extrabold font-display text-gradient leading-none mb-1">{{ $totalCompletados }}</p>
                    <p class="text-xs uppercase tracking-wider text-gray-500">Completados</p>
                </div>
            </div>

            <div class="glass-card rounded-2xl p-5 relative overflow-hidden">
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-yellow-500 rounded-full blur-3xl opacity-15"></div>
                <div class="relative z-10">
                    <div class="w-10 h-10 rounded-xl bg-yellow-500/15 border border-yellow-500/25 flex items-center justify-center mb-3">
                        <i class="fas fa-spinner text-yellow-400 text-sm"></i>
                    </div>
                    <p id="stats-progress" class="text-3xl font-extrabold font-display text-gradient leading-none mb-1">{{ $totalEnProgreso }}</p>
                    <p class="text-xs uppercase tracking-wider text-gray-500">En progreso</p>
                </div>
            </div>

            <div class="glass-card rounded-2xl p-5 relative overflow-hidden">
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-tec-500 rounded-full blur-3xl opacity-15"></div>
                <div class="relative z-10">
                    <div class="w-10 h-10 rounded-xl bg-tec-500/15 border border-tec-500/25 flex items-center justify-center mb-3">
                        <i class="fas fa-clipboard-check text-tec-400 text-sm"></i>
                    </div>
                    <p id="stats-total" class="text-3xl font-extrabold font-display text-gradient leading-none mb-1">{{ $totalTests }}</p>
                    <p class="text-xs uppercase tracking-wider text-gray-500">Total</p>
                </div>
            </div>

            <div class="glass-card rounded-2xl p-5 relative overflow-hidden">
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-valle-500 rounded-full blur-3xl opacity-15"></div>
                <div class="relative z-10">
                    <div class="w-10 h-10 rounded-xl bg-valle-500/15 border border-valle-500/25 flex items-center justify-center mb-3">
                        <i class="fas fa-calendar-day text-valle-400 text-sm"></i>
                    </div>
                    <p id="stats-days" class="text-3xl font-extrabold font-display text-gradient leading-none mb-1">{{ $diasSeguimiento }}</p>
                    <p class="text-xs uppercase tracking-wider text-gray-500">Días</p>
                </div>
            </div>
        </section>

        <!-- GRID DE TESTS -->
        <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-12">
            @foreach($tests as $test)
                @php
                    $estado = $test->estado;
                    $resultado = $test->resultado;
                    $topCategorias = [];
                    $puntosData = [];
                    $estaCompletado = $estado && $estado->nombre == 'finalizado';
                    $tieneResultado = $estaCompletado && $resultado;

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

                    $testNumber = $loop->iteration;
                @endphp

                <article class="test-card glass-card rounded-3xl p-6 animate-fade-in-up" style="animation-delay: {{ $loop->index * 80 }}ms;" data-card>
                    <!-- Header -->
                    <div class="flex items-start justify-between mb-5">
                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0
                                {{ $estaCompletado ? 'bg-gradient-to-br from-valle-500 to-valle-700' : 'bg-gradient-to-br from-yellow-500 to-yellow-700' }}
                                shadow-lg {{ $estaCompletado ? 'shadow-valle-500/30' : 'shadow-yellow-500/30' }}">
                                <i class="fas {{ $estaCompletado ? 'fa-trophy' : 'fa-hourglass-half' }} text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-base font-bold font-display leading-tight">Test #{{ $testNumber }}</h3>
                                <p class="text-xs text-gray-500 leading-tight mt-0.5">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    @if($test->fecha_finalizacion)
                                        {{ $test->fecha_finalizacion->format('d/m/Y') }}
                                    @else
                                        {{ $test->fecha_inicio->format('d/m/Y') }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div>
                            @if($estaCompletado)
                                <span class="badge badge-completed">
                                    <i class="fas fa-check text-[10px]"></i> Completado
                                </span>
                            @else
                                <span class="badge badge-progress">
                                    <i class="fas fa-hourglass text-[10px]"></i> En progreso
                                </span>
                            @endif
                        </div>
                    </div>

                    @if($estaCompletado && !empty($puntosData))
                    <div class="mb-5">
                        <div class="mini-chart-container">
                            <canvas id="chart-{{ $test->id_test }}"></canvas>
                        </div>
                    </div>

                    <div class="mb-5 text-center">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-2">Perfil dominante</p>
                        <div class="flex justify-center flex-wrap gap-2">
                            @if($topCategorias)
                                @foreach($topCategorias as $categoria)
                                    <span class="riasec-badge riasec-{{ $categoria }}">
                                        {{ $categoria }}
                                    </span>
                                @endforeach
                            @else
                                <span class="text-xs text-gray-500">Sin resultados</span>
                            @endif
                        </div>
                    </div>
                    @else
                    <div class="mb-5 text-center py-6">
                        <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-yellow-500/15 border border-yellow-500/25 mb-3">
                            <i class="fas fa-hourglass-half text-yellow-400 animate-pulse"></i>
                        </div>
                        <p class="text-gray-300 text-sm font-semibold">Test en progreso</p>
                        <p class="text-gray-500 text-xs mt-1">Complétalo para ver tu reporte</p>
                    </div>
                    @endif

                    @if($estaCompletado && $carreras->isNotEmpty())
                    <div class="mb-5">
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-2 text-center">Carreras recomendadas</p>
                        <div class="space-y-2">
                            @foreach($carreras as $carrera)
                                <div class="flex items-center gap-2.5 p-2.5 rounded-xl bg-white/[0.03] border border-white/5">
                                    <div class="w-6 h-6 rounded-lg bg-valle-500/15 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-graduation-cap text-valle-400 text-[10px]"></i>
                                    </div>
                                    <span class="text-xs flex-1 truncate text-gray-300">{{ $carrera->nombre }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Acciones -->
                    <div class="flex items-center gap-2 pt-4 border-t border-white/5 flex-wrap">
                        @if(!$estaCompletado)
                            <a href="{{ route('test.question', ['test' => $test->id_test, 'index' => $test->id_pregunta_actual ?? 0]) }}"
                               class="flex-1 inline-flex items-center justify-center gap-2 py-2.5 px-3 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-tec-500 to-valle-500 hover:from-tec-600 hover:to-valle-600 shadow-lg shadow-tec-500/25 hover:scale-[1.02] transition-all duration-300">
                                <i class="fas fa-play"></i>
                                Continuar
                            </a>

                            <span class="btn-download-disabled" title="Completa el test para descargar el reporte">
                                <i class="fas fa-file-pdf"></i>
                                <span>PDF</span>
                            </span>
                        @else
                            <a href="{{ route('test.result', $test->id_test) }}"
                               class="flex-1 inline-flex items-center justify-center gap-2 py-2.5 px-3 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-tec-500 to-valle-500 hover:from-tec-600 hover:to-valle-600 shadow-lg shadow-tec-500/25 hover:scale-[1.02] transition-all duration-300">
                                <i class="fas fa-chart-bar"></i>
                                Detalles
                            </a>

                            <button onclick="descargarReporte({{ $test->id_test }}, this)"
                                    class="btn-download"
                                    title="Descargar reporte en PDF">
                                <i class="fas fa-file-pdf"></i>
                                <span class="download-text">PDF</span>
                            </button>

                            @if($tieneResultado)
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSdGueRjDtm1nrimtpjCE2CsLMprFGBtAWRQfiDSYM0alhEqEg/viewform?usp=publish-editor"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="btn-survey"
                            title="Calificar tu experiencia">
                                <i class="fas fa-star"></i>
                                <span>Cuéntanos tu experiencia</span>
                            </a>
                            @endif
                        @endif

                        <button class="delete-test flex-shrink-0 w-9 h-9 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition-all duration-300 flex items-center justify-center"
                                data-test-id="{{ $test->id_test }}"
                                title="Eliminar test">
                            <i class="fas fa-trash text-xs"></i>
                        </button>
                    </div>
                </article>

                @if($estaCompletado && !empty($puntosData))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const ctx = document.getElementById('chart-{{ $test->id_test }}').getContext('2d');

                        const backgroundColors = [
                            'rgba(239, 68, 68, 0.85)',
                            'rgba(59, 130, 246, 0.85)',
                            'rgba(139, 92, 246, 0.85)',
                            'rgba(16, 185, 129, 0.85)',
                            'rgba(245, 158, 11, 0.85)',
                            'rgba(99, 102, 241, 0.85)'
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

                        const maxValue = Math.max(...rawData, 1);
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
                                    borderRadius: 6,
                                    borderSkipped: false,
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: { display: false },
                                    tooltip: {
                                        backgroundColor: 'rgba(10, 18, 32, 0.95)',
                                        titleColor: '#ffffff',
                                        bodyColor: '#ffffff',
                                        borderColor: 'rgba(255, 255, 255, 0.15)',
                                        borderWidth: 1,
                                        cornerRadius: 10,
                                        padding: 10,
                                        displayColors: false,
                                        callbacks: {
                                            label: function(context) {
                                                const originalValue = rawData[context.dataIndex];
                                                return `Puntuación: ${originalValue}`;
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        max: 10,
                                        grid: {
                                            color: 'rgba(255, 255, 255, 0.05)',
                                            drawBorder: false
                                        },
                                        ticks: {
                                            color: 'rgba(255, 255, 255, 0.4)',
                                            font: { size: 9 },
                                            stepSize: 2
                                        }
                                    },
                                    x: {
                                        grid: { display: false, drawBorder: false },
                                        ticks: {
                                            color: 'rgba(255, 255, 255, 0.7)',
                                            font: { size: 10, weight: 'bold' }
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
        </section>
        @endif

        <!-- BOTÓN VOLVER -->
        <div class="text-center">
            <a href="{{ route('estudiante.home') }}"
               class="inline-flex items-center gap-2 px-6 py-3 rounded-xl glass-soft hover:bg-white/10 text-sm font-medium text-gray-300 hover:text-white transition-all duration-300">
                <i class="fas fa-arrow-left text-xs"></i>
                Volver al dashboard
            </a>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="relative z-10 border-t border-white/5 mt-12">
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
                    <p class="text-[10px] text-gray-600 mt-1">Tu historial de crecimiento profesional</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            'use strict';

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

            document.querySelectorAll('.test-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.01)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

        });

        function descargarReporte(testId, button) {
            if (button.classList.contains('btn-download-loading')) return;

            const originalText = button.querySelector('.download-text').textContent;
            const icon = button.querySelector('i');

            button.classList.add('btn-download-loading');
            button.querySelector('.download-text').textContent = 'Descargando...';
            icon.className = 'fas fa-spinner fa-spin';

            fetch(`/reporte/test/${testId}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => {
                        throw new Error(data.message || 'Error al descargar el reporte');
                    });
                }
                return response.blob();
            })
            .then(blob => {
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `reporte_${testId}_${new Date().toISOString().slice(0,10)}.pdf`;
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);
                mostrarNotificacion('Reporte descargado exitosamente', 'success');
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarNotificacion(error.message || 'Error al descargar el reporte', 'error');
            })
            .finally(() => {
                button.classList.remove('btn-download-loading');
                button.querySelector('.download-text').textContent = originalText;
                icon.className = 'fas fa-file-pdf';
            });
        }

        function mostrarNotificacion(mensaje, tipo = 'info') {
            const notification = document.createElement('div');
            notification.className = `notification notification-${tipo}`;
            const iconName = tipo === 'success' ? 'check-circle' : tipo === 'error' ? 'exclamation-circle' : 'info-circle';
            notification.innerHTML = `
                <div class="flex items-center gap-3">
                    <i class="fas fa-${iconName} text-lg"></i>
                    <span>${mensaje}</span>
                </div>
            `;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.classList.add('show');
            }, 50);

            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 500);
            }, 4000);
        }

        let testToDelete = null;
        const deleteModal = document.getElementById('deleteModal');
        const cancelDeleteBtn = document.getElementById('cancelDelete');
        const confirmDeleteBtn = document.getElementById('confirmDelete');

        function showDeleteModal() {
            deleteModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function hideDeleteModal() {
            deleteModal.classList.remove('active');
            document.body.style.overflow = '';
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
                    const deleteBtn = document.querySelector(`[data-test-id="${testToDelete}"]`);
                    const testCard = deleteBtn ? deleteBtn.closest('.test-card') : null;
                    if (testCard) {
                        testCard.style.transition = 'all 0.4s cubic-bezier(0.16, 1, 0.3, 1)';
                        testCard.style.opacity = '0';
                        testCard.style.transform = 'scale(0.85) translateY(-10px)';

                        setTimeout(() => {
                            testCard.remove();
                            if (data.stats) updateStats(data.stats);
                            mostrarNotificacion('Test eliminado correctamente', 'success');
                            checkEmptyState();
                        }, 400);
                    }
                } else {
                    mostrarNotificacion(data.message || 'Error al eliminar el test', 'error');
                }

            } catch (error) {
                console.error('Error:', error);
                mostrarNotificacion('Error de conexión al eliminar el test', 'error');
            } finally {
                confirmDeleteBtn.innerHTML = '<i class="fas fa-trash mr-2"></i>Eliminar';
                confirmDeleteBtn.disabled = false;
                hideDeleteModal();
            }
        }

        function updateStats(stats) {
            const elCompleted = document.getElementById('stats-completed');
            const elProgress = document.getElementById('stats-progress');
            const elTotal = document.getElementById('stats-total');
            const elDays = document.getElementById('stats-days');
            if (elCompleted) elCompleted.textContent = stats.completados;
            if (elProgress) elProgress.textContent = stats.en_progreso;
            if (elTotal) elTotal.textContent = stats.total;
            if (elDays) elDays.textContent = stats.dias_seguimiento;
        }

        function checkEmptyState() {
            const remainingTests = document.querySelectorAll('.test-card').length;
            if (remainingTests === 0) {
                setTimeout(() => window.location.reload(), 1000);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-test').forEach(button => {
                button.addEventListener('click', function() {
                    testToDelete = this.getAttribute('data-test-id');
                    showDeleteModal();
                });
            });

            cancelDeleteBtn?.addEventListener('click', hideDeleteModal);
            confirmDeleteBtn?.addEventListener('click', deleteTest);

            deleteModal?.addEventListener('click', function(e) {
                if (e.target === deleteModal) hideDeleteModal();
            });
        });
    </script>
</body>
</html>