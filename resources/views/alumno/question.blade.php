<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test Vocacional · Inspiratec | TESVB Valle de Bravo</title>
    <meta name="description" content="Test vocacional RIASEC del TESVB Valle de Bravo.">

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
                        'fade-in-up': 'fadeInUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) both',
                        'float': 'float 6s ease-in-out infinite',
                        'blob': 'blob 15s ease-in-out infinite',
                        'gradient': 'gradient 6s ease infinite',
                        'pulse-ring': 'pulseRing 2.5s ease-out infinite',
                        'pulse-soft': 'pulseSoft 1.5s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(24px)' },
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
                        pulseRing: {
                            '0%': { transform: 'scale(0.9)', opacity: '0.6' },
                            '100%': { transform: 'scale(1.6)', opacity: '0' },
                        },
                        pulseSoft: {
                            '0%, 100%': { transform: 'scale(1)' },
                            '50%': { transform: 'scale(1.05)' },
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
           GLASS
           ============================================ */
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

        /* ============================================
           PROGRESS
           ============================================ */
        .progress-bar {
            transition: width 0.9s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .progress-ring { transform: rotate(-90deg); }
        .progress-ring-circle {
            transition: stroke-dashoffset 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* ============================================
           HISTORIAL CHIPS
           ============================================ */
        .history-bar {
            display: flex;
            gap: 6px;
            overflow-x: auto;
            overflow-y: hidden;
            padding: 12px 4px;
            scrollbar-width: thin;
            scrollbar-color: rgba(0, 128, 255, 0.4) transparent;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
        }
        .history-bar::-webkit-scrollbar { height: 5px; }
        .history-bar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 10px;
        }
        .history-bar::-webkit-scrollbar-thumb {
            background: linear-gradient(90deg, #0080ff, #4dbe4d);
            border-radius: 10px;
        }

        .history-chip {
            flex-shrink: 0;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 800;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            border: 1.5px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.03);
            color: rgba(255, 255, 255, 0.4);
        }
        .history-chip:hover {
            transform: translateY(-3px) scale(1.08);
            border-color: rgba(255, 255, 255, 0.25);
            z-index: 2;
        }
        .history-chip.answered-yes {
            background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
            border-color: rgba(34, 197, 94, 0.4);
            color: #fff;
            box-shadow: 0 4px 12px -4px rgba(34, 197, 94, 0.5);
        }
        .history-chip.answered-no {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            border-color: rgba(220, 38, 38, 0.4);
            color: #fff;
            box-shadow: 0 4px 12px -4px rgba(220, 38, 38, 0.5);
        }
        .history-chip.current {
            border-color: #4db3ff;
            box-shadow:
                0 0 0 3px rgba(77, 179, 255, 0.2),
                0 0 20px rgba(77, 179, 255, 0.4);
            transform: scale(1.1);
            z-index: 3;
        }
        .history-chip.current::after {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 14px;
            border: 2px solid rgba(77, 179, 255, 0.5);
            animation: pulseRing 2s ease-out infinite;
        }
        .history-chip .chip-icon {
            position: absolute;
            top: -4px;
            right: -4px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #fff;
            color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8px;
            font-weight: 900;
        }
        .history-chip.answered-yes .chip-icon { background: #4dbe4d; color: #fff; }
        .history-chip.answered-no .chip-icon { background: #ef4444; color: #fff; }

        /* ============================================
           CARD STACK (Tinder)
           ============================================ */
        .card-stack {
            position: relative;
            height: 420px;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            perspective: 1200px;
        }

        .swipe-card {
            position: absolute;
            inset: 0;
            background: linear-gradient(160deg, rgba(20, 30, 50, 0.9) 0%, rgba(10, 18, 32, 0.95) 100%);
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.75rem;
            padding: 2rem 1.75rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            cursor: grab;
            user-select: none;
            -webkit-user-select: none;
            touch-action: none;
            will-change: transform;
            box-shadow:
                0 30px 60px -20px rgba(0, 0, 0, 0.7),
                0 0 0 1px rgba(255, 255, 255, 0.03) inset,
                0 0 80px -30px rgba(0, 128, 255, 0.3);
            overflow: hidden;
        }
        .swipe-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, #0080ff, #4dbe4d, transparent);
            background-size: 200% auto;
            animation: gradient 3s linear infinite;
        }
        .swipe-card:active { cursor: grabbing; }
        .swipe-card.behind-1 {
            transform: scale(0.94) translateY(14px);
            opacity: 0.55;
            z-index: 1;
            pointer-events: none;
        }
        .swipe-card.behind-2 {
            transform: scale(0.88) translateY(28px);
            opacity: 0.25;
            z-index: 0;
            pointer-events: none;
        }
        .swipe-card.active { z-index: 10; }
        .swipe-card.dragging { transition: none; cursor: grabbing; }
        .swipe-card.animating {
            transition: transform 0.55s cubic-bezier(0.16, 1, 0.3, 1),
                        opacity 0.55s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Indicadores SÍ/NO */
        .swipe-indicator {
            position: absolute;
            top: 2rem;
            padding: 0.5rem 1.25rem;
            border-radius: 0.75rem;
            font-weight: 800;
            font-size: 1.5rem;
            letter-spacing: 0.1em;
            opacity: 0;
            transition: opacity 0.15s ease;
            border: 3px solid currentColor;
            pointer-events: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
            z-index: 20;
        }
        .swipe-indicator.yes {
            right: 1.5rem;
            color: #4dbe4d;
            transform: rotate(14deg);
            text-shadow: 0 0 20px rgba(77, 190, 77, 0.6);
        }
        .swipe-indicator.no {
            left: 1.5rem;
            color: #ef4444;
            transform: rotate(-14deg);
            text-shadow: 0 0 20px rgba(239, 68, 68, 0.6);
        }

        /* ============================================
           BOTONES
           ============================================ */
        .action-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            min-width: 130px;
        }
        .action-btn:hover { transform: translateY(-4px) scale(1.03); }
        .action-btn:active { transform: translateY(-1px) scale(0.98); }
        .action-btn.btn-no {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            box-shadow: 0 15px 30px -10px rgba(220, 38, 38, 0.5);
        }
        .action-btn.btn-no:hover { box-shadow: 0 20px 40px -10px rgba(220, 38, 38, 0.75); }
        .action-btn.btn-yes {
            background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
            box-shadow: 0 15px 30px -10px rgba(34, 197, 94, 0.5);
        }
        .action-btn.btn-yes:hover { box-shadow: 0 20px 40px -10px rgba(34, 197, 94, 0.75); }

        .btn-submit-test {
            background: linear-gradient(135deg, #0080ff 0%, #4dbe4d 100%);
            background-size: 200% 200%;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }
        .btn-submit-test:hover {
            background-position: 100% 50%;
            transform: translateY(-2px);
            box-shadow: 0 20px 40px -10px rgba(0, 128, 255, 0.6);
        }
        .btn-submit-test::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s ease;
        }
        .btn-submit-test:hover::before { left: 100%; }

        /* ============================================
           KBD
           ============================================ */
        .kbd {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 1.5rem;
            height: 1.5rem;
            padding: 0 0.375rem;
            font-family: ui-monospace, SFMono-Regular, monospace;
            font-size: 0.6875rem;
            font-weight: 600;
            color: rgba(255,255,255,0.7);
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.15);
            border-bottom-width: 2px;
            border-radius: 0.375rem;
        }

        /* ============================================
           SYNC INDICATOR
           ============================================ */
        .sync-indicator {
            position: fixed;
            top: 5.5rem;
            right: 1.25rem;
            z-index: 60;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0.875rem;
            border-radius: 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            background: rgba(10, 18, 32, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            opacity: 0;
            transform: translateX(20px);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            pointer-events: none;
        }
        .sync-indicator.show {
            opacity: 1;
            transform: translateX(0);
        }
        .sync-indicator .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #4dbe4d;
        }
        .sync-indicator.saving .dot {
            background: #f59e0b;
            animation: pulseSoft 1s ease-in-out infinite;
        }
        .sync-indicator.error .dot { background: #ef4444; }
        .sync-indicator.success .dot { background: #4dbe4d; }

        /* ============================================
           BLOBS + PARTICLES
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
           MODAL
           ============================================ */
        .modal-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0, 5, 13, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            z-index: 200;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.4s ease, visibility 0.4s ease;
        }
        .modal-backdrop.show { opacity: 1; visibility: visible; }
        .modal-content {
            transform: scale(0.85) translateY(20px);
            transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .modal-backdrop.show .modal-content {
            transform: scale(1) translateY(0);
        }

        /* ============================================
           TOAST
           ============================================ */
        .toast {
            position: fixed;
            bottom: 1.5rem;
            left: 50%;
            transform: translateX(-50%) translateY(150%);
            z-index: 9999;
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            pointer-events: none;
        }
        .toast.show {
            transform: translateX(-50%) translateY(0);
            pointer-events: auto;
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

        .d-100 { animation-delay: 100ms; }
        .d-200 { animation-delay: 200ms; }
        .d-300 { animation-delay: 300ms; }

        @media (max-width: 640px) {
            .blobs-wrapper, .particles { display: none !important; }
            body::before { background-size: 40px 40px; }
            .card-stack { height: 380px; max-width: 340px; }
            .swipe-card { padding: 1.5rem 1.25rem; border-radius: 1.5rem; }
            .kbd { display: none; }
            .history-chip { width: 36px; height: 36px; font-size: 12px; }
            .sync-indicator { top: 4.5rem; right: 0.75rem; }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen font-sans text-white antialiased">

    @php
        $todasLasPreguntas = \App\Models\Pregunta::with('categoria')->orderBy('id_pregunta')->get();
        $totalPreguntas = $todasLasPreguntas->count();
        $numeroActual = $index + 1;
        $circunferencia = 2 * M_PI * 45;

        // Preparar datos para el JS
        $preguntasJson = $todasLasPreguntas->map(function($p) {
            return [
                'id_pregunta' => $p->id_pregunta,
                'descripcion' => $p->descripcion,
                'categoria'   => $p->categoria->codigo ?? null,
            ];
        })->values()->toArray();
    @endphp

    <div class="blobs-wrapper">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
    </div>

    <div class="particles" id="particles"></div>

    <!-- ============================================
         SYNC INDICATOR
         ============================================ -->
    <div id="syncIndicator" class="sync-indicator">
        <span class="dot"></span>
        <span id="syncText">Guardado</span>
    </div>

    <!-- ============================================
         NAVBAR
         ============================================ -->
    <header id="navbar" class="navbar fixed top-0 left-0 right-0 z-50 py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('alumno.dashboard') }}" class="flex items-center gap-3 group"
               onclick="return confirm('¿Seguro que quieres salir? Tu progreso está guardado, puedes continuar después.')">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-lg shadow-tec-500/30 group-hover:scale-105 transition-transform duration-300">
                    <i class="fas fa-arrow-left text-white"></i>
                </div>
                <div class="hidden sm:block">
                    <h1 class="text-base font-bold font-display tracking-tight leading-tight">Inspiratec</h1>
                    <p class="text-[10px] uppercase tracking-widest text-tec-300 font-medium leading-tight">Test Vocacional</p>
                </div>
            </a>

            <div class="flex items-center gap-3">
                <div class="hidden md:flex items-center gap-3 px-3 py-1.5 rounded-full glass-soft">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-md">
                        <span class="text-white font-bold text-xs">{{ substr(auth()->user()->nombre ?? auth()->user()->name, 0, 1) }}</span>
                    </div>
                    <div class="pr-1">
                        <p class="text-xs font-semibold leading-tight">{{ auth()->user()->nombre ?? auth()->user()->name }}</p>
                        <p class="text-[10px] text-tec-300 leading-tight" id="navProgress">Respondidas: 0/{{ $totalPreguntas }}</p>
                    </div>
                </div>
                <div class="md:hidden w-9 h-9 rounded-full bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-md">
                    <span class="text-white font-bold text-sm">{{ substr(auth()->user()->nombre ?? auth()->user()->name, 0, 1) }}</span>
                </div>
            </div>
        </div>
    </header>

    <!-- ============================================
         MAIN
         ============================================ -->
    <main class="container mx-auto px-4 pt-24 pb-16 relative z-10">
        <div class="max-w-3xl mx-auto">

            <!-- HEADER PROGRESO -->
            <div class="glass-card rounded-3xl p-5 sm:p-6 mb-6 animate-fade-in-up">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <div class="relative w-16 h-16 sm:w-20 sm:h-20">
                            <svg class="progress-ring w-16 h-16 sm:w-20 sm:h-20" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="45" stroke="rgba(255,255,255,0.06)" stroke-width="8" fill="none"/>
                                <circle cx="50" cy="50" r="45"
                                        stroke="url(#ringGradient)"
                                        stroke-width="8" fill="none" stroke-linecap="round"
                                        stroke-dasharray="{{ $circunferencia }}"
                                        stroke-dashoffset="{{ $circunferencia }}"
                                        id="progressRing"
                                        class="progress-ring-circle"/>
                                <defs>
                                    <linearGradient id="ringGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#4db3ff"/>
                                        <stop offset="100%" stop-color="#4dbe4d"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-sm sm:text-base font-extrabold font-display text-gradient" id="progressPercent">0%</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-2">
                            <div>
                                <p class="text-[10px] uppercase tracking-wider text-gray-500 leading-tight">Respondidas</p>
                                <p class="text-2xl font-extrabold font-display text-white leading-none">
                                    <span id="answeredCount">0</span><span class="text-tec-400 text-lg">/{{ $totalPreguntas }}</span>
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-[10px] uppercase tracking-wider text-gray-500 leading-tight">Restantes</p>
                                <p class="text-sm font-semibold text-valle-300"><span id="remainingCount">{{ $totalPreguntas }}</span> preguntas</p>
                            </div>
                        </div>

                        <div class="w-full bg-white/5 rounded-full h-2 overflow-hidden">
                            <div class="progress-bar bg-gradient-to-r from-tec-500 to-valle-500 h-2 rounded-full"
                                 id="progressBar" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- HISTORIAL -->
            <div class="glass-card rounded-3xl p-4 mb-6 animate-fade-in-up d-100">
                <div class="flex items-center justify-between mb-2 px-1">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-list-ul text-tec-400 text-sm"></i>
                        <p class="text-xs font-semibold text-gray-300">Historial de respuestas</p>
                    </div>
                    <p class="text-[10px] text-gray-500 uppercase tracking-wider">Toca cualquier número para revisar</p>
                </div>
                <div class="history-bar" id="historyBar"></div>
                <div class="flex items-center justify-center gap-4 mt-3 text-[10px] text-gray-500 flex-wrap">
                    <div class="flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded-md bg-gradient-to-br from-green-500 to-green-700"></span>
                        <span>Sí</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded-md bg-gradient-to-br from-red-500 to-red-700"></span>
                        <span>No</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded-md bg-white/10 border border-white/20"></span>
                        <span>Sin responder</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded-md border-2 border-tec-400"></span>
                        <span>Actual</span>
                    </div>
                </div>
            </div>

            <!-- CARD STACK -->
            <div class="animate-fade-in-up d-200 mb-6">
                <div class="card-stack" id="cardStack">
                    <div class="swipe-card behind-2"></div>
                    <div class="swipe-card behind-1"></div>

                    <div class="swipe-card active" id="activeCard">
                        <div class="swipe-indicator yes" id="indicatorYes">SÍ</div>
                        <div class="swipe-indicator no" id="indicatorNo">NO</div>

                        <div class="relative z-10 w-full">
                            <div class="flex justify-center mb-6">
                                <div class="relative">
                                    <div class="pulse-ring absolute inset-0 rounded-2xl bg-valle-500/40"></div>
                                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-2xl shadow-tec-500/40 relative z-10">
                                        <span class="text-white font-extrabold font-display text-xl" id="cardNumber">{{ $numeroActual }}</span>
                                    </div>
                                </div>
                            </div>

                            <p class="text-[10px] uppercase tracking-widest text-tec-300 mb-3 font-medium text-center">¿Te identificas?</p>
                            <h3 class="text-lg sm:text-xl md:text-2xl font-bold font-display leading-snug text-white mb-4 text-center" id="cardQuestion">
                                {{ $pregunta['descripcion'] }}
                            </h3>
                            <p class="text-gray-400 text-xs text-center">
                                Arrastra la carta o usa los botones
                            </p>

                            <div class="flex items-center justify-between mt-8 text-[10px] uppercase tracking-widest text-gray-500">
                                <div class="flex items-center gap-1.5">
                                    <i class="fas fa-arrow-left"></i>
                                    <span>No</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span>Sí</span>
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BOTONES NO / SÍ -->
            <div class="flex justify-center items-center gap-5 sm:gap-8 animate-fade-in-up d-300 mb-6">
                <button type="button" id="btnNo"
                        class="action-btn btn-no rounded-2xl py-4 px-6 sm:px-8 text-white font-bold flex flex-col items-center gap-1">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-times text-xl"></i>
                        <span class="text-base">No</span>
                    </div>
                    <span class="kbd mt-1">←</span>
                </button>

                <button type="button" id="btnYes"
                        class="action-btn btn-yes rounded-2xl py-4 px-6 sm:px-8 text-white font-bold flex flex-col items-center gap-1">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check text-xl"></i>
                        <span class="text-base">Sí</span>
                    </div>
                    <span class="kbd mt-1">→</span>
                </button>
            </div>

            <!-- BOTÓN ENVIAR -->
            <div id="submitSection" class="animate-fade-in-up mb-6 hidden">
                <div class="glass-card rounded-3xl p-6 border-2 border-valle-500/40 relative overflow-hidden">
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-valle-500 rounded-full blur-3xl opacity-20"></div>
                    <div class="relative z-10 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-tec-500 to-valle-500 mb-4 shadow-2xl shadow-tec-500/40 animate-float">
                            <i class="fas fa-paper-plane text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold font-display mb-2">¡Terminaste todas las preguntas!</h3>
                        <p class="text-sm text-gray-400 mb-5 max-w-md mx-auto">
                            Puedes revisar tus respuestas tocando los números del historial.
                            Cuando estés listo, envía el test para ver tu resultado.
                        </p>
                        <button type="button" id="btnSubmit"
                                class="btn-submit-test w-full sm:w-auto px-10 py-4 rounded-2xl font-bold text-white text-base shadow-2xl shadow-tec-500/30">
                            <span class="relative z-10 inline-flex items-center justify-center gap-2">
                                <i class="fas fa-check-circle"></i>
                                Enviar test y ver mi resultado
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- FORM OCULTO (batch) -->
            <form action="{{ route('test.answerBatch', ['test' => $test->id_test]) }}" method="POST" id="answerForm">
                @csrf
                <div id="respuestasContainer"></div>
            </form>

            <!-- TIPS -->
            <div class="glass-soft rounded-2xl p-4 animate-fade-in-up">
                <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-6 text-xs text-gray-400">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-mouse-pointer text-tec-400"></i>
                        <span>Arrastra la carta</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-hand-pointer text-valle-400"></i>
                        <span>O usa los botones</span>
                    </div>
                    <div class="hidden sm:flex items-center gap-2">
                        <i class="fas fa-keyboard text-tec-400"></i>
                        <span>O el teclado ← →</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-cloud-arrow-up text-valle-400"></i>
                        <span>Se guarda automáticamente</span>
                    </div>
                </div>
            </div>

            <!-- ============================================
                 CRÉDITOS Y AVISO LEGAL (debajo del test)
                 ============================================ -->
            <section class="relative z-10 mt-8 animate-fade-in-up">
                <div class="glass-card rounded-3xl p-6 sm:p-8">

                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-lg shadow-tec-500/30">
                            <i class="fas fa-book-open text-white text-sm"></i>
                        </div>
                        <div>
                            <h3 class="text-base font-bold font-display leading-tight">Créditos y Reconocimientos</h3>
                            <p class="text-[10px] uppercase tracking-widest text-tec-300 leading-tight">Fuente del instrumento RIASEC</p>
                        </div>
                    </div>

                    <div class="space-y-4 text-sm text-gray-400 leading-relaxed">
                        <p>
                            El cuestionario RIASEC utilizado en este proyecto académico se basa en el instrumento publicado por
                            <span class="text-white font-semibold">University of Hawaiʻi Community Colleges</span>
                            mediante <span class="text-white font-semibold">Hawaiʻi Career Explorer</span>.
                        </p>

                        <div class="glass-soft rounded-2xl p-4">
                            <p class="text-[10px] uppercase tracking-widest text-tec-300 mb-2 font-semibold">Fuente original</p>
                            <p class="text-white font-medium mb-1">Explore by Interests – RIASEC Survey</p>
                            <a href="https://careerexplorer.hawaii.edu/assessments/riasec_multiLang.php"
                               target="_blank" rel="noopener noreferrer"
                               class="text-tec-400 hover:text-tec-300 underline underline-offset-2 break-all text-xs transition-colors">
                                https://careerexplorer.hawaii.edu/assessments/riasec_multiLang.php
                            </a>
                        </div>

                        <p>
                            Se reconoce la procedencia del material original y los derechos que correspondan a sus titulares.
                            Este proyecto tiene fines académicos, es gratuito y sin fines de lucro.
                        </p>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-1">
                            <div class="glass-soft rounded-2xl p-3 text-center">
                                <i class="fas fa-graduation-cap text-tec-400 text-lg mb-1"></i>
                                <p class="text-[10px] uppercase tracking-wider text-gray-500">Uso</p>
                                <p class="text-xs font-semibold text-white">Académico</p>
                            </div>
                            <div class="glass-soft rounded-2xl p-3 text-center">
                                <i class="fas fa-hand-holding-heart text-valle-400 text-lg mb-1"></i>
                                <p class="text-[10px] uppercase tracking-wider text-gray-500">Costo</p>
                                <p class="text-xs font-semibold text-white">Gratuito</p>
                            </div>
                            <div class="glass-soft rounded-2xl p-3 text-center">
                                <i class="fas fa-shield-halved text-tec-400 text-lg mb-1"></i>
                                <p class="text-[10px] uppercase tracking-wider text-gray-500">Datos</p>
                                <p class="text-xs font-semibold text-white">Confidenciales</p>
                            </div>
                        </div>

                        <div class="border-t border-white/5 pt-4">
                            <p class="text-xs text-gray-500 leading-relaxed">
                                <i class="fas fa-circle-info text-tec-400 mr-1"></i>
                                Los resultados de este test son orientativos y no constituyen un diagnóstico vocacional definitivo.
                            </p>
                        </div>

                        <div class="border-t border-white/5 pt-4">
                            <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-2 font-semibold">Información del proyecto</p>
                            <div class="flex flex-wrap gap-x-5 gap-y-1 text-xs text-gray-400">
                                <span><i class="fas fa-code text-tec-400 mr-1"></i> Inspiratec · TESVB</span>
                                <span><i class="fas fa-location-dot text-valle-400 mr-1"></i> Valle de Bravo, México</span>
                                <span><i class="fas fa-calendar text-tec-400 mr-1"></i> {{ date('Y') }}</span>
                                <span><i class="fas fa-rotate text-valle-400 mr-1"></i> Versión 1.0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="relative z-10 border-t border-white/5 mt-8">
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
                    <p class="text-[10px] text-gray-600 mt-1">Test Vocacional RIASEC · Proyecto académico sin fines de lucro</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- MODAL CONFIRMACIÓN -->
    <div id="confirmModal" class="modal-backdrop">
        <div class="modal-content glass-card rounded-3xl p-7 max-w-md w-full">
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-gradient-to-br from-tec-500 to-valle-500 mb-5 shadow-2xl shadow-tec-500/40">
                    <i class="fas fa-paper-plane text-3xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold font-display mb-3">¿Enviar tu test?</h3>
                <p class="text-sm text-gray-400 mb-6 leading-relaxed">
                    Una vez enviado, no podrás modificar tus respuestas.
                    Recibirás tu perfil vocacional personalizado.
                </p>

                <div class="grid grid-cols-2 gap-3 mb-6">
                    <div class="glass-soft rounded-2xl p-3 text-center">
                        <p class="text-2xl font-extrabold font-display text-valle-300" id="modalYesCount">0</p>
                        <p class="text-[10px] uppercase tracking-wider text-gray-500 mt-1">Respuestas Sí</p>
                    </div>
                    <div class="glass-soft rounded-2xl p-3 text-center">
                        <p class="text-2xl font-extrabold font-display text-red-400" id="modalNoCount">0</p>
                        <p class="text-[10px] uppercase tracking-wider text-gray-500 mt-1">Respuestas No</p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button type="button" id="modalCancel"
                            class="flex-1 py-3 rounded-xl font-semibold text-sm text-gray-300 glass-soft hover:bg-white/10 transition-all">
                        Cancelar
                    </button>
                    <button type="button" id="modalConfirm"
                            class="flex-1 py-3 rounded-xl font-bold text-sm text-white btn-submit-test">
                        <span class="relative z-10">Sí, enviar</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- TOAST -->
    <div id="toast" class="toast">
        <div class="glass-card rounded-2xl px-5 py-3 flex items-center gap-3 shadow-2xl">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" id="toastIcon"
                 style="background: linear-gradient(135deg, #0080ff 0%, #4dbe4d 100%);">
                <i class="fas fa-info text-white"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-white leading-tight" id="toastText">Mensaje</p>
                <p class="text-xs text-gray-400 leading-tight mt-0.5" id="toastSubtext"></p>
            </div>
        </div>
    </div>

    <!-- ============================================
         JAVASCRIPT
         ============================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            'use strict';

            /* ============================================
               DATOS DEL SERVIDOR
               ============================================ */
            const PREGUNTAS = @json($preguntasJson);
            const TEST_ID = {{ $test->id_test }};
            const INITIAL_INDEX = {{ $index }};
            const TOTAL = PREGUNTAS.length;
            const STORAGE_KEY = 'inspiratec_test_' + TEST_ID;
            const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').content;
            const URL_ANSWER_SINGLE = '{{ route("test.answerSingle", ["test" => $test->id_test]) }}';
            const URL_GET_ANSWERS = '{{ route("test.answers", ["test" => $test->id_test]) }}';

            /* ============================================
               ESTADO
               ============================================ */
            let respuestas = {}; // { id_pregunta_string: 'si' | 'no' }
            let currentIndex = INITIAL_INDEX;
            let isDragging = false;
            let startX = 0, startY = 0, currentX = 0, currentY = 0;
            let isAnimating = false;
            let isSubmitting = false;
            const SWIPE_THRESHOLD = 100;

            /* ============================================
               REFERENCIAS DOM
               ============================================ */
            const navbar = document.getElementById('navbar');
            const activeCard = document.getElementById('activeCard');
            const indicatorYes = document.getElementById('indicatorYes');
            const indicatorNo = document.getElementById('indicatorNo');
            const btnYes = document.getElementById('btnYes');
            const btnNo = document.getElementById('btnNo');
            const btnSubmit = document.getElementById('btnSubmit');
            const answerForm = document.getElementById('answerForm');
            const respuestasContainer = document.getElementById('respuestasContainer');
            const historyBar = document.getElementById('historyBar');
            const cardNumber = document.getElementById('cardNumber');
            const cardQuestion = document.getElementById('cardQuestion');
            const answeredCountEl = document.getElementById('answeredCount');
            const remainingCountEl = document.getElementById('remainingCount');
            const progressBar = document.getElementById('progressBar');
            const progressRing = document.getElementById('progressRing');
            const progressPercent = document.getElementById('progressPercent');
            const navProgress = document.getElementById('navProgress');
            const submitSection = document.getElementById('submitSection');
            const confirmModal = document.getElementById('confirmModal');
            const modalYesCount = document.getElementById('modalYesCount');
            const modalNoCount = document.getElementById('modalNoCount');
            const modalCancel = document.getElementById('modalCancel');
            const modalConfirm = document.getElementById('modalConfirm');
            const toast = document.getElementById('toast');
            const toastText = document.getElementById('toastText');
            const toastSubtext = document.getElementById('toastSubtext');
            const toastIcon = document.getElementById('toastIcon');
            const syncIndicator = document.getElementById('syncIndicator');
            const syncText = document.getElementById('syncText');

            const CIRCUNFERENCIA = 2 * Math.PI * 45;

            /* ============================================
               STORAGE (backup local)
               ============================================ */
            function loadLocalProgress() {
                try {
                    const saved = localStorage.getItem(STORAGE_KEY);
                    if (saved) {
                        const data = JSON.parse(saved);
                        if (data.respuestas) {
                            Object.keys(data.respuestas).forEach(k => {
                                respuestas[String(k)] = data.respuestas[k];
                            });
                        }
                    }
                } catch (e) {
                    console.warn('No se pudo cargar localStorage:', e);
                }
            }

            function saveLocalProgress() {
                try {
                    localStorage.setItem(STORAGE_KEY, JSON.stringify({
                        respuestas: respuestas,
                        currentIndex: currentIndex,
                        savedAt: new Date().toISOString()
                    }));
                } catch (e) {
                    console.warn('No se pudo guardar localStorage:', e);
                }
            }

            function clearLocalProgress() {
                try {
                    localStorage.removeItem(STORAGE_KEY);
                } catch (e) {}
            }

            /* ============================================
               SINCRONIZACIÓN CON SERVIDOR
               ============================================ */
            async function loadFromServer() {
                try {
                    const res = await fetch(URL_GET_ANSWERS, {
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': CSRF_TOKEN,
                        },
                        credentials: 'same-origin',
                    });
                    if (!res.ok) throw new Error('HTTP ' + res.status);
                    const data = await res.json();
                    if (data.success && data.respuestas) {
                        Object.keys(data.respuestas).forEach(k => {
                            respuestas[String(k)] = data.respuestas[k];
                        });
                    }
                } catch (e) {
                    console.warn('No se pudo cargar del servidor:', e);
                }
            }

            async function saveToServer(idPregunta, respuesta) {
                showSync('saving', 'Guardando...');

                try {
                    const res = await fetch(URL_ANSWER_SINGLE, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': CSRF_TOKEN,
                        },
                        credentials: 'same-origin',
                        body: JSON.stringify({
                            id_pregunta: parseInt(idPregunta),
                            respuesta: respuesta,
                        }),
                    });

                    if (!res.ok) throw new Error('HTTP ' + res.status);
                    const data = await res.json();

                    if (data.success) {
                        showSync('success', 'Guardado ✓');
                    } else {
                        showSync('error', 'Error al guardar');
                    }
                } catch (e) {
                    console.error('Error guardando respuesta:', e);
                    showSync('error', 'Sin conexión');
                }
            }

            let syncTimeout = null;
            function showSync(type, text) {
                syncIndicator.className = 'sync-indicator show ' + type;
                syncText.textContent = text;
                clearTimeout(syncTimeout);
                syncTimeout = setTimeout(() => {
                    syncIndicator.classList.remove('show');
                }, 1800);
            }

            /* ============================================
               NAVBAR SCROLL
               ============================================ */
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
               RENDER HISTORIAL
               ============================================ */
            function renderHistory() {
                let html = '';
                PREGUNTAS.forEach((p, i) => {
                    const id = p.id_pregunta;
                    const respuesta = respuestas[String(id)];
                    const isCurrent = i === currentIndex;

                    let classes = 'history-chip';
                    let icon = '';
                    if (respuesta === 'si') {
                        classes += ' answered-yes';
                        icon = '<span class="chip-icon"><i class="fas fa-check"></i></span>';
                    } else if (respuesta === 'no') {
                        classes += ' answered-no';
                        icon = '<span class="chip-icon"><i class="fas fa-times"></i></span>';
                    }
                    if (isCurrent) classes += ' current';

                    html += `<div class="${classes}" data-index="${i}" data-id="${id}" title="Pregunta ${i + 1}">${i + 1}${icon}</div>`;
                });
                historyBar.innerHTML = html;

                setTimeout(() => {
                    const currentChip = historyBar.querySelector('.history-chip.current');
                    if (currentChip) {
                        currentChip.scrollIntoView({
                            behavior: 'smooth',
                            inline: 'center',
                            block: 'nearest'
                        });
                    }
                }, 100);

                historyBar.querySelectorAll('.history-chip').forEach(chip => {
                    chip.addEventListener('click', function() {
                        goToQuestion(parseInt(this.dataset.index));
                    });
                });
            }

            /* ============================================
               RENDER CARD ACTUAL
               ============================================ */
            function renderCard() {
                const p = PREGUNTAS[currentIndex];
                if (!p) return;

                const id = p.id_pregunta;
                const respuestaActual = respuestas[String(id)];

                cardNumber.textContent = currentIndex + 1;
                cardQuestion.textContent = p.descripcion;

                activeCard.style.transition = 'none';
                activeCard.style.transform = 'translate(0, 0) rotate(0)';
                activeCard.style.opacity = '1';

                if (respuestaActual === 'si') {
                    indicatorYes.style.opacity = 0.35;
                    indicatorNo.style.opacity = 0;
                } else if (respuestaActual === 'no') {
                    indicatorNo.style.opacity = 0.35;
                    indicatorYes.style.opacity = 0;
                } else {
                    indicatorYes.style.opacity = 0;
                    indicatorNo.style.opacity = 0;
                }
                currentX = 0;
                currentY = 0;
            }

            /* ============================================
               ACTUALIZAR PROGRESO
               ============================================ */
            function updateProgress() {
                const answered = Object.keys(respuestas).length;
                const porcentaje = TOTAL > 0 ? Math.round((answered / TOTAL) * 100) : 0;

                answeredCountEl.textContent = answered;
                remainingCountEl.textContent = TOTAL - answered;
                progressBar.style.width = porcentaje + '%';
                progressPercent.textContent = porcentaje + '%';
                navProgress.textContent = `Respondidas: ${answered}/${TOTAL}`;

                const offset = CIRCUNFERENCIA - (porcentaje / 100) * CIRCUNFERENCIA;
                progressRing.style.strokeDashoffset = offset;

                if (answered === TOTAL && TOTAL > 0) {
                    submitSection.classList.remove('hidden');
                } else {
                    submitSection.classList.add('hidden');
                }
            }

            /* ============================================
               IR A PREGUNTA
               ============================================ */
            function goToQuestion(idx) {
                if (idx < 0 || idx >= PREGUNTAS.length || isAnimating) return;

                isAnimating = true;
                activeCard.style.transition = 'transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease';
                activeCard.style.opacity = '0';
                activeCard.style.transform = 'scale(0.95)';

                setTimeout(() => {
                    currentIndex = idx;
                    renderCard();
                    renderHistory();
                    saveLocalProgress();

                    setTimeout(() => {
                        activeCard.style.transition = 'transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.4s ease';
                        activeCard.style.opacity = '1';
                        activeCard.style.transform = 'translate(0, 0) rotate(0) scale(1)';
                        isAnimating = false;
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }, 50);
                }, 300);
            }

            /* ============================================
               RESPONDER
               ============================================ */
            function setAnswer(answer, direction) {
                if (isAnimating || isSubmitting) return;

                const p = PREGUNTAS[currentIndex];
                if (!p) return;

                const id = String(p.id_pregunta);
                const respuestaPrevia = respuestas[id];

                respuestas[id] = answer;
                saveLocalProgress();

                saveToServer(id, answer);

                updateProgress();
                renderHistory();

                isAnimating = true;
                const exitX = direction * (window.innerWidth + 200);
                const rotation = direction * 30;
                activeCard.style.transition = 'transform 0.55s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.55s ease';
                activeCard.style.transform = `translate(${exitX}px, ${currentY}px) rotate(${rotation}deg)`;
                activeCard.style.opacity = '0';

                if (direction > 0) indicatorYes.style.opacity = 1;
                else indicatorNo.style.opacity = 1;

                showToast(
                    answer === 'si' ? 'Respondiste: Sí' : 'Respondiste: No',
                    respuestaPrevia ? 'Respuesta actualizada' : (currentIndex === PREGUNTAS.length - 1 ? '¡Última pregunta!' : 'Siguiente pregunta...'),
                    answer === 'si' ? 'check' : 'times',
                    answer === 'si' ? '#22c55e' : '#dc2626'
                );

                setTimeout(() => {
                    let nextIndex = currentIndex + 1;

                    if (nextIndex < PREGUNTAS.length && respuestas[String(PREGUNTAS[nextIndex].id_pregunta)]) {
                        const firstUnanswered = PREGUNTAS.findIndex(q => !respuestas[String(q.id_pregunta)]);
                        if (firstUnanswered !== -1) nextIndex = firstUnanswered;
                    }

                    if (nextIndex < PREGUNTAS.length) {
                        setTimeout(() => {
                            currentIndex = nextIndex;
                            renderCard();
                            renderHistory();
                            saveLocalProgress();
                            activeCard.style.transition = 'transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.4s ease';
                            activeCard.style.opacity = '1';
                            activeCard.style.transform = 'translate(0, 0) rotate(0)';
                            isAnimating = false;
                        }, 50);
                    } else {
                        const allAnswered = PREGUNTAS.every(q => respuestas[String(q.id_pregunta)]);
                        if (!allAnswered) {
                            const firstUnanswered = PREGUNTAS.findIndex(q => !respuestas[String(q.id_pregunta)]);
                            if (firstUnanswered !== -1) currentIndex = firstUnanswered;
                        }
                        setTimeout(() => {
                            renderCard();
                            renderHistory();
                            isAnimating = false;
                        }, 50);
                    }
                }, 350);
            }

            /* ============================================
               DRAG / SWIPE
               ============================================ */
            function getClientX(e) {
                if (e.touches && e.touches.length) return e.touches[0].clientX;
                if (e.changedTouches && e.changedTouches.length) return e.changedTouches[0].clientX;
                return e.clientX;
            }
            function getClientY(e) {
                if (e.touches && e.touches.length) return e.touches[0].clientY;
                if (e.changedTouches && e.changedTouches.length) return e.changedTouches[0].clientY;
                return e.clientY;
            }

            function startDrag(e) {
                if (isAnimating || isSubmitting) return;
                isDragging = true;
                startX = getClientX(e);
                startY = getClientY(e);
                currentX = 0;
                currentY = 0;
                activeCard.classList.add('dragging');
                activeCard.classList.remove('animating');
            }

            function moveDrag(e) {
                if (!isDragging) return;
                if (e.cancelable && e.touches) e.preventDefault();

                currentX = getClientX(e) - startX;
                currentY = getClientY(e) - startY;

                const rotation = currentX * 0.08;
                activeCard.style.transform = `translate(${currentX}px, ${currentY}px) rotate(${rotation}deg)`;

                const opacityYes = Math.min(Math.max(currentX / SWIPE_THRESHOLD, 0), 1);
                const opacityNo = Math.min(Math.max(-currentX / SWIPE_THRESHOLD, 0), 1);
                indicatorYes.style.opacity = opacityYes;
                indicatorNo.style.opacity = opacityNo;
            }

            function endDrag(e) {
                if (!isDragging) return;
                isDragging = false;
                activeCard.classList.remove('dragging');
                activeCard.classList.add('animating');

                if (currentX > SWIPE_THRESHOLD) {
                    setAnswer('si', 1);
                } else if (currentX < -SWIPE_THRESHOLD) {
                    setAnswer('no', -1);
                } else {
                    activeCard.style.transform = 'translate(0, 0) rotate(0)';
                    indicatorYes.style.opacity = 0;
                    indicatorNo.style.opacity = 0;
                }
            }

            activeCard.addEventListener('mousedown', startDrag);
            document.addEventListener('mousemove', moveDrag);
            document.addEventListener('mouseup', endDrag);

            activeCard.addEventListener('touchstart', startDrag, { passive: true });
            activeCard.addEventListener('touchmove', moveDrag, { passive: false });
            activeCard.addEventListener('touchend', endDrag);
            activeCard.addEventListener('touchcancel', endDrag);

            /* ============================================
               BOTONES
               ============================================ */
            btnYes?.addEventListener('click', () => setAnswer('si', 1));
            btnNo?.addEventListener('click', () => setAnswer('no', -1));

            /* ============================================
               TECLADO
               ============================================ */
            document.addEventListener('keydown', (e) => {
                const tag = document.activeElement?.tagName;
                if (tag === 'INPUT' || tag === 'TEXTAREA' || tag === 'SELECT') return;

                if (e.key === 'ArrowRight' || e.key === '1') {
                    e.preventDefault();
                    setAnswer('si', 1);
                } else if (e.key === 'ArrowLeft' || e.key === '2') {
                    e.preventDefault();
                    setAnswer('no', -1);
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    goToQuestion(currentIndex - 1);
                } else if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    goToQuestion(currentIndex + 1);
                }
            });

            /* ============================================
               TOAST
               ============================================ */
            let toastTimeout = null;
            function showToast(text, subtext, icon, color) {
                toastText.textContent = text;
                toastSubtext.textContent = subtext || '';
                toastIcon.style.background = color || 'linear-gradient(135deg, #0080ff 0%, #4dbe4d 100%)';
                toastIcon.innerHTML = `<i class="fas fa-${icon || 'info'} text-white"></i>`;

                toast.classList.add('show');
                clearTimeout(toastTimeout);
                toastTimeout = setTimeout(() => {
                    toast.classList.remove('show');
                }, 2000);
            }

            /* ============================================
               MODAL ENVIAR
               ============================================ */
            btnSubmit?.addEventListener('click', () => {
                let yes = 0, no = 0;
                Object.values(respuestas).forEach(r => {
                    if (r === 'si') yes++;
                    else if (r === 'no') no++;
                });
                modalYesCount.textContent = yes;
                modalNoCount.textContent = no;
                confirmModal.classList.add('show');
            });

            modalCancel?.addEventListener('click', () => {
                confirmModal.classList.remove('show');
            });

            confirmModal?.addEventListener('click', (e) => {
                if (e.target === confirmModal) confirmModal.classList.remove('show');
            });

            modalConfirm?.addEventListener('click', () => submitTest());

            function submitTest() {
                if (isSubmitting) return;
                isSubmitting = true;

                respuestasContainer.innerHTML = '';
                Object.keys(respuestas).forEach(idPregunta => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = `respuestas[${idPregunta}]`;
                    input.value = respuestas[idPregunta];
                    respuestasContainer.appendChild(input);
                });

                modalConfirm.innerHTML = '<span class="relative z-10 inline-flex items-center gap-2"><i class="fas fa-circle-notch fa-spin"></i> Enviando...</span>';
                modalConfirm.disabled = true;

                setTimeout(() => {
                    clearLocalProgress();
                    answerForm.submit();
                }, 400);
            }

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
               INICIALIZACIÓN
               ============================================ */
            async function init() {
                loadLocalProgress();
                await loadFromServer();

                const firstUnanswered = PREGUNTAS.findIndex(q => !respuestas[String(q.id_pregunta)]);
                if (firstUnanswered !== -1) {
                    currentIndex = firstUnanswered;
                }

                renderCard();
                renderHistory();
                updateProgress();

                const totalAnswered = Object.keys(respuestas).length;
                if (totalAnswered > 0) {
                    setTimeout(() => {
                        showToast(
                            '¡Bienvenido de nuevo!',
                            `Tienes ${totalAnswered} respuestas guardadas`,
                            'save',
                            'linear-gradient(135deg, #0080ff 0%, #4dbe4d 100%)'
                        );
                    }, 800);
                }
            }

            init();

        });
    </script>
</body>
</html>