<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Resultados · Inspiratec | TESVB Valle de Bravo</title>
    <meta name="description" content="Resultados de tu test vocacional RIASEC.">

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
                        'bounce-soft': 'bounceSoft 2.5s ease-in-out infinite',
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
                        },
                        bounceSoft: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-12px)' },
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

        .riasec-badge {
            padding: 0.5rem 0.875rem;
            border-radius: 12px;
            font-weight: 800;
            font-size: 0.8125rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 2.75rem;
            box-shadow: 0 4px 12px -4px rgba(0, 0, 0, 0.4);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .riasec-R { background: linear-gradient(135deg, #ef4444, #dc2626); }
        .riasec-I { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .riasec-A { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
        .riasec-S { background: linear-gradient(135deg, #10b981, #059669); }
        .riasec-E { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .riasec-C { background: linear-gradient(135deg, #6366f1, #4f46e5); }

        .career-card {
            position: relative;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            background: rgba(10, 18, 32, 0.55);
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 1.25rem;
        }
        .career-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: var(--card-color, linear-gradient(90deg, #0080ff, #4dbe4d));
            z-index: 2;
        }
        .career-card::after {
            content: '';
            position: absolute;
            top: -50%; right: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(circle, var(--card-glow, rgba(0, 128, 255, 0.15)) 0%, transparent 40%);
            opacity: 0;
            transition: opacity 0.5s ease;
            pointer-events: none;
            z-index: 0;
        }
        .career-card:hover::after { opacity: 1; }
        .career-card:hover {
            transform: translateY(-8px);
            border-color: var(--card-border, rgba(0, 128, 255, 0.3));
            box-shadow:
                0 30px 60px -20px var(--card-shadow, rgba(0, 128, 255, 0.4)),
                0 0 0 1px var(--card-border, rgba(0, 128, 255, 0.3)) inset;
        }

        .career-card[data-cat="R"] { --card-color: linear-gradient(90deg, #ef4444, #dc2626); --card-glow: rgba(239, 68, 68, 0.15); --card-border: rgba(239, 68, 68, 0.35); --card-shadow: rgba(239, 68, 68, 0.35); }
        .career-card[data-cat="I"] { --card-color: linear-gradient(90deg, #3b82f6, #2563eb); --card-glow: rgba(59, 130, 246, 0.15); --card-border: rgba(59, 130, 246, 0.35); --card-shadow: rgba(59, 130, 246, 0.35); }
        .career-card[data-cat="A"] { --card-color: linear-gradient(90deg, #8b5cf6, #7c3aed); --card-glow: rgba(139, 92, 246, 0.15); --card-border: rgba(139, 92, 246, 0.35); --card-shadow: rgba(139, 92, 246, 0.35); }
        .career-card[data-cat="S"] { --card-color: linear-gradient(90deg, #10b981, #059669); --card-glow: rgba(16, 185, 129, 0.15); --card-border: rgba(16, 185, 129, 0.35); --card-shadow: rgba(16, 185, 129, 0.35); }
        .career-card[data-cat="E"] { --card-color: linear-gradient(90deg, #f59e0b, #d97706); --card-glow: rgba(245, 158, 11, 0.15); --card-border: rgba(245, 158, 11, 0.35); --card-shadow: rgba(245, 158, 11, 0.35); }
        .career-card[data-cat="C"] { --card-color: linear-gradient(90deg, #6366f1, #4f46e5); --card-glow: rgba(99, 102, 241, 0.15); --card-border: rgba(99, 102, 241, 0.35); --card-shadow: rgba(99, 102, 241, 0.35); }

        .career-icon {
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.25rem;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .career-card:hover .career-icon { transform: scale(1.08) rotate(-4deg); }

        .career-card[data-cat="R"] .career-icon { background: linear-gradient(135deg, rgba(239,68,68,0.2), rgba(239,68,68,0.05)); color: #f87171; border-color: rgba(239,68,68,0.3); }
        .career-card[data-cat="I"] .career-icon { background: linear-gradient(135deg, rgba(59,130,246,0.2), rgba(59,130,246,0.05)); color: #60a5fa; border-color: rgba(59,130,246,0.3); }
        .career-card[data-cat="A"] .career-icon { background: linear-gradient(135deg, rgba(139,92,246,0.2), rgba(139,92,246,0.05)); color: #a78bfa; border-color: rgba(139,92,246,0.3); }
        .career-card[data-cat="S"] .career-icon { background: linear-gradient(135deg, rgba(16,185,129,0.2), rgba(16,185,129,0.05)); color: #34d399; border-color: rgba(16,185,129,0.3); }
        .career-card[data-cat="E"] .career-icon { background: linear-gradient(135deg, rgba(245,158,11,0.2), rgba(245,158,11,0.05)); color: #fbbf24; border-color: rgba(245,158,11,0.3); }
        .career-card[data-cat="C"] .career-icon { background: linear-gradient(135deg, rgba(99,102,241,0.2), rgba(99,102,241,0.05)); color: #818cf8; border-color: rgba(99,102,241,0.3); }

        .match-score { display: flex; align-items: center; gap: 0.375rem; }
        .match-dot { width: 6px; height: 6px; border-radius: 50%; background: rgba(255,255,255,0.15); }
        .match-dot.active { background: #4dbe4d; box-shadow: 0 0 8px rgba(77, 190, 77, 0.6); }
        .match-dot.active-high { background: #22c55e; box-shadow: 0 0 10px rgba(34, 197, 94, 0.8); }

        .chart-container { position: relative; height: 320px; width: 100%; }

        .blobs-wrapper { position: fixed; inset: 0; overflow: hidden; pointer-events: none; z-index: 0; }
        .blob { position: absolute; border-radius: 50%; filter: blur(80px); z-index: 0; pointer-events: none; opacity: 0.4; }
        .blob-1 { width: 450px; height: 450px; background: #0080ff; top: -150px; left: -150px; animation: blob 16s ease-in-out infinite; }
        .blob-2 { width: 400px; height: 400px; background: #4dbe4d; bottom: -120px; right: -120px; animation: blob 20s ease-in-out infinite reverse; }
        .particles { position: fixed; inset: 0; overflow: hidden; pointer-events: none; z-index: 0; }
        .particle { position: absolute; width: 2px; height: 2px; background: rgba(255, 255, 255, 0.5); border-radius: 50%; animation: floatParticle linear infinite; }
        @keyframes floatParticle {
            0% { transform: translateY(100vh); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh); opacity: 0; }
        }

        /* CHAT - ESTILOS EXTRA */
        #chatModal .glass-card {
            background: rgba(10, 18, 32, 0.92);
        }
        #chatMensajes::-webkit-scrollbar { width: 6px; }
        #chatMensajes::-webkit-scrollbar-track { background: transparent; }
        #chatMensajes::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
        }
        #chatMensajes::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        /* ⭐ ESTILOS PARA HTML DEL ASISTENTE */
        .chat-response strong {
            color: #4db3ff;
            font-weight: 700;
        }
        .chat-response a {
            color: #4db3ff;
            text-decoration: underline;
            transition: color 0.2s ease;
        }
        .chat-response a:hover {
            color: #4dbe4d;
        }
        .chat-response em {
            color: rgba(255, 255, 255, 0.6);
            font-style: italic;
        }
        .chat-response br {
            line-height: 1.8;
        }
        .chat-response ul,
        .chat-response ol {
            padding-left: 1.25rem;
            margin: 0.5rem 0;
        }
        .chat-response li {
            margin-bottom: 0.25rem;
        }

        /* Animación del botón flotante */
        @keyframes chatPulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(0, 128, 255, 0.4); }
            50% { box-shadow: 0 0 0 12px rgba(0, 128, 255, 0); }
        }
        #chatBubble { animation: chatPulse 3s infinite; }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #00050d; }
        ::-webkit-scrollbar-thumb { background: linear-gradient(180deg, #0080ff, #4dbe4d); border-radius: 10px; }
        ::selection { background: rgba(0, 128, 255, 0.4); color: white; }

        .d-100 { animation-delay: 100ms; }
        .d-200 { animation-delay: 200ms; }
        .d-300 { animation-delay: 300ms; }

        @media (max-width: 768px) {
            .blobs-wrapper, .particles { display: none !important; }
            body::before { background-size: 40px 40px; }
            .chart-container { height: 260px; }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen font-sans text-white antialiased">

    @php
        $maxPuntos = max($puntos);
        $totalPuntos = array_sum($puntos);
        $descripciones = [
            'R' => ['label' => 'Realista',     'icon' => 'fa-tools',           'text' => 'Prácticos y mecánicos, disfrutan trabajar con herramientas, objetos y actividades al aire libre.'],
            'I' => ['label' => 'Investigador', 'icon' => 'fa-microscope',      'text' => 'Analíticos e intelectuales, orientados a la investigación, el análisis y la resolución de problemas.'],
            'A' => ['label' => 'Artístico',    'icon' => 'fa-palette',         'text' => 'Creativos y expresivos, disfrutan las actividades artísticas, originales y no estructuradas.'],
            'S' => ['label' => 'Social',       'icon' => 'fa-users',           'text' => 'Cooperativos y empáticos, orientados a ayudar, enseñar y cuidar a otras personas.'],
            'E' => ['label' => 'Emprendedor',  'icon' => 'fa-briefcase',       'text' => 'Ambiciosos y persuasivos, disfrutan liderar, influir y tomar decisiones importantes.'],
            'C' => ['label' => 'Convencional', 'icon' => 'fa-chart-bar',       'text' => 'Organizados y detallistas, prefieren ambientes estructurados con procedimientos claros.'],
        ];

        function calcularCompatibilidad($catCodigo, $puntos, $maxPuntos) {
            if ($maxPuntos <= 0) return 0;
            $puntosCat = $puntos[$catCodigo] ?? 0;
            return round(($puntosCat / $maxPuntos) * 100);
        }
    @endphp

    <div class="blobs-wrapper">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
    </div>
    <div class="particles" id="particles"></div>

    <!-- NAVBAR -->
    <header id="navbar" class="navbar fixed top-0 left-0 right-0 z-50 py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('estudiante.home') }}" class="flex items-center gap-3 group">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-lg shadow-tec-500/30 group-hover:scale-105 transition-transform duration-300">
                    <i class="fas fa-arrow-left text-white"></i>
                </div>
                <div class="hidden sm:block">
                    <h1 class="text-base font-bold font-display tracking-tight leading-tight">Inspiratec</h1>
                    <p class="text-[10px] uppercase tracking-widest text-tec-300 font-medium leading-tight">Resultados</p>
                </div>
            </a>

            <div class="flex items-center gap-3">
                <a href="{{ route('test.history') }}"
                   class="hidden md:inline-flex items-center gap-2 px-4 py-2 rounded-xl glass-soft hover:bg-white/10 text-xs font-medium text-gray-300 hover:text-white transition-all duration-300">
                    <i class="fas fa-history text-tec-400"></i>
                    <span>Historial</span>
                </a>

                <div class="hidden md:flex items-center gap-3 px-3 py-1.5 rounded-full glass-soft">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-md">
                        <span class="text-white font-bold text-xs">{{ substr(auth()->user()->nombre ?? auth()->user()->name, 0, 1) }}</span>
                    </div>
                    <div class="pr-1">
                        <p class="text-xs font-semibold leading-tight">{{ auth()->user()->nombre ?? auth()->user()->name }}</p>
                        <p class="text-[10px] text-tec-300 leading-tight">Test completado</p>
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

        <section class="text-center mb-10 animate-fade-in-down">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-gradient-to-br from-tec-500 to-valle-500 mb-5 shadow-2xl shadow-tec-500/40 animate-bounce-soft">
                <i class="fas fa-trophy text-3xl text-white"></i>
            </div>

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold font-display mb-3 tracking-tight leading-tight">
                ¡Test <span class="text-gradient">completado</span>!
            </h1>
            <p class="text-base md:text-lg text-gray-400 max-w-2xl mx-auto leading-relaxed">
                Este es tu perfil vocacional y las carreras que mejor se adaptan a tu personalidad.
            </p>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

            <!-- COLUMNA IZQUIERDA -->
            <div class="lg:col-span-1 space-y-6">

                <div class="glass-card rounded-3xl p-6 animate-fade-in-up">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-xl bg-yellow-500/15 border border-yellow-500/25 flex items-center justify-center">
                            <i class="fas fa-crown text-yellow-400"></i>
                        </div>
                        <h3 class="text-lg font-bold font-display">Tu perfil dominante</h3>
                    </div>

                    <div class="flex justify-center flex-wrap gap-2 mb-5">
                        @foreach($topCategorias as $categoria)
                            <span class="riasec-badge riasec-{{ $categoria }} text-base px-4 py-2.5">
                                {{ $categoria }}
                            </span>
                        @endforeach
                    </div>

                    <p class="text-xs text-gray-500 text-center mb-5 leading-relaxed">
                        Estos son tus tipos de personalidad profesional más destacados según el modelo RIASEC.
                    </p>

                    <div class="space-y-3">
                        @foreach($topCategorias as $categoria)
                            <div class="p-3.5 rounded-xl bg-white/[0.03] border border-white/5">
                                <div class="flex items-center gap-2.5 mb-2">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center
                                        @if($categoria == 'R') bg-red-500/15 text-red-400
                                        @elseif($categoria == 'I') bg-blue-500/15 text-blue-400
                                        @elseif($categoria == 'A') bg-purple-500/15 text-purple-400
                                        @elseif($categoria == 'S') bg-green-500/15 text-green-400
                                        @elseif($categoria == 'E') bg-yellow-500/15 text-yellow-400
                                        @else bg-indigo-500/15 text-indigo-400
                                        @endif
                                    ">
                                        <i class="fas {{ $descripciones[$categoria]['icon'] }} text-xs"></i>
                                    </div>
                                    <h4 class="font-semibold text-sm">
                                        {{ $descripciones[$categoria]['label'] }}
                                        <span class="text-gray-500 font-normal">({{ $categoria }})</span>
                                    </h4>
                                </div>
                                <p class="text-xs text-gray-400 leading-relaxed">{{ $descripciones[$categoria]['text'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="glass-card rounded-3xl p-6 animate-fade-in-up d-100">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-xl bg-tec-500/15 border border-tec-500/25 flex items-center justify-center">
                            <i class="fas fa-chart-simple text-tec-400"></i>
                        </div>
                        <h3 class="text-lg font-bold font-display">Resumen de puntajes</h3>
                    </div>

                    <div class="space-y-3">
                        @foreach(['R', 'I', 'A', 'S', 'E', 'C'] as $cat)
                            <div class="flex items-center gap-3">
                                <span class="text-xs font-bold w-6
                                    @if($cat == 'R') text-red-400
                                    @elseif($cat == 'I') text-blue-400
                                    @elseif($cat == 'A') text-purple-400
                                    @elseif($cat == 'S') text-green-400
                                    @elseif($cat == 'E') text-yellow-400
                                    @else text-indigo-400
                                    @endif
                                ">{{ $cat }}</span>
                                <div class="flex-1">
                                    <div class="w-full bg-white/5 rounded-full h-2 overflow-hidden">
                                        <div class="h-2 rounded-full transition-all duration-700
                                            @if($cat == 'R') bg-gradient-to-r from-red-500 to-red-600
                                            @elseif($cat == 'I') bg-gradient-to-r from-blue-500 to-blue-600
                                            @elseif($cat == 'A') bg-gradient-to-r from-purple-500 to-purple-600
                                            @elseif($cat == 'S') bg-gradient-to-r from-green-500 to-green-600
                                            @elseif($cat == 'E') bg-gradient-to-r from-yellow-500 to-yellow-600
                                            @else bg-gradient-to-r from-indigo-500 to-indigo-600
                                            @endif"
                                            style="width: {{ $maxPuntos > 0 ? ($puntos[$cat] / $maxPuntos) * 100 : 0 }}%">
                                        </div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-white w-10 text-right">{{ $puntos[$cat] }} pts</span>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- COLUMNA DERECHA -->
            <div class="lg:col-span-2 space-y-6">

                <div class="glass-card rounded-3xl p-6 animate-fade-in-up d-200">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-valle-500/15 border border-valle-500/25 flex items-center justify-center">
                            <i class="fas fa-chart-bar text-valle-400"></i>
                        </div>
                        <h3 class="text-lg font-bold font-display">Distribución RIASEC</h3>
                    </div>
                    <div class="chart-container">
                        <canvas id="resultChart"></canvas>
                    </div>
                </div>

                <div class="glass-card rounded-3xl p-6 animate-fade-in-up d-300">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-tec-500/15 border border-tec-500/25 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-tec-400"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-bold font-display">Carreras recomendadas</h3>
                            <p class="text-xs text-gray-500 mt-0.5">Toca "Explorar" para preguntar a nuestro asistente IA</p>
                        </div>
                        <span class="text-xs font-semibold text-valle-300 bg-valle-500/10 border border-valle-500/20 px-3 py-1.5 rounded-full">
                            {{ $carreras->whereIn('cat_codigo', $topCategorias)->count() }}
                            {{ $carreras->whereIn('cat_codigo', $topCategorias)->count() === 1 ? 'carrera' : 'carreras' }}
                        </span>
                    </div>

                    @if($carreras->whereIn('cat_codigo', $topCategorias)->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($carreras->whereIn('cat_codigo', $topCategorias) as $carrera)
                                @php
                                    $compat = calcularCompatibilidad($carrera->cat_codigo, $puntos, $maxPuntos);
                                    $dots = ceil($compat / 20);
                                @endphp

                                <div class="career-card p-5" data-cat="{{ $carrera->cat_codigo }}">

                                    <div class="flex items-start justify-between gap-3 mb-4 relative z-10">
                                        <div class="career-icon">
                                            <i class="fas {{ $descripciones[$carrera->cat_codigo]['icon'] ?? 'fa-graduation-cap' }}"></i>
                                        </div>
                                        <span class="riasec-badge riasec-{{ $carrera->cat_codigo }} text-xs">
                                            {{ $carrera->cat_codigo }}
                                        </span>
                                    </div>

                                    <div class="relative z-10">
                                        <h4 class="font-bold font-display text-base text-white mb-2 leading-snug">
                                            {{ $carrera->nombre }}
                                        </h4>

                                        <p class="text-xs text-gray-400 leading-relaxed mb-4">
                                            Compatible con tu perfil
                                            <span class="font-semibold text-white">
                                                {{ $descripciones[$carrera->cat_codigo]['label'] ?? $carrera->cat_codigo }}
                                            </span>
                                        </p>

                                        <div class="flex items-center justify-between mb-4 pb-4 border-b border-white/5">
                                            <div class="flex items-center gap-2">
                                                <span class="text-[10px] uppercase tracking-wider text-gray-500 font-semibold">Compatibilidad</span>
                                                <span class="text-sm font-bold
                                                    @if($compat >= 80) text-green-400
                                                    @elseif($compat >= 60) text-tec-400
                                                    @elseif($compat >= 40) text-yellow-400
                                                    @else text-gray-400
                                                    @endif
                                                ">{{ $compat }}%</span>
                                            </div>
                                            <div class="match-score">
                                                @for($i = 0; $i < 5; $i++)
                                                    <span class="match-dot {{ $i < $dots ? ($compat >= 80 ? 'active-high' : 'active') : '' }}"></span>
                                                @endfor
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-between">
                                            <span class="text-[10px] text-valle-300 font-semibold uppercase tracking-wider">
                                                <i class="fas fa-star mr-1"></i> Recomendada
                                            </span>
                                            <button type="button"
                                                    onclick="abrirChat('{{ addslashes($carrera->nombre) }}', {{ $test->id_test }})"
                                                    class="text-[10px] text-gray-500 hover:text-valle-300 flex items-center gap-1 transition-colors cursor-pointer font-medium">
                                                <i class="fas fa-comments"></i>
                                                Preguntar a la IA
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-10">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-white/5 border border-white/10 mb-4">
                                <i class="fas fa-search text-gray-500 text-xl"></i>
                            </div>
                            <h4 class="text-base font-semibold text-white mb-2">Aún no hay carreras relacionadas</h4>
                            <p class="text-xs text-gray-500 max-w-xs mx-auto leading-relaxed">
                                Próximamente se agregarán más carreras al catálogo.
                            </p>
                        </div>
                    @endif
                </div>

            </div>
        </div>

        <div class="text-center mt-10">
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
                    <p class="text-[10px] text-gray-600 mt-1">Resultados del Test Vocacional RIASEC</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- BOTÓN FLOTANTE DEL CHAT -->
    <button type="button"
            id="chatBubble"
            onclick="abrirChat(null, {{ $test->id_test }})"
            class="fixed bottom-6 right-6 z-40 w-14 h-14 rounded-full bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center text-white shadow-2xl shadow-tec-500/40 hover:scale-110 transition-transform duration-300"
            aria-label="Abrir asistente vocacional">
        <i class="fas fa-comments text-xl"></i>
        <span class="absolute -top-1 -right-1 w-3 h-3 bg-valle-400 rounded-full animate-pulse"></span>
    </button>

    <!-- MODAL DEL CHAT -->
    <div id="chatModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" onclick="cerrarChat()"></div>

        <div class="absolute bottom-4 right-4 left-4 sm:left-auto sm:w-[420px] h-[85vh] sm:h-[600px] glass-card rounded-3xl overflow-hidden flex flex-col animate-fade-in-up">

            <div class="p-4 border-b border-white/10 flex items-center justify-between flex-shrink-0">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-lg shadow-tec-500/30">
                            <i class="fas fa-robot text-white text-sm"></i>
                        </div>
                        <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-valle-400 rounded-full border-2 border-[#0a1220]"></span>
                    </div>
                    <div>
                        <p class="text-sm font-bold font-display">Asistente Vocacional</p>
                        <p class="text-[10px] text-valle-300 flex items-center gap-1">
                            <i class="fas fa-database text-[8px]"></i>
                            Información oficial de Inspiratec
                        </p>
                    </div>
                </div>
                <button type="button" onclick="cerrarChat()"
                        class="w-8 h-8 rounded-lg hover:bg-white/10 text-gray-400 hover:text-white transition-colors flex items-center justify-center">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div id="chatCarreraChip" class="hidden px-4 py-2 border-b border-white/5 bg-white/[0.02] flex-shrink-0">
                <div class="flex items-center gap-2 text-xs text-gray-300">
                    <i class="fas fa-graduation-cap text-tec-400 text-[10px]"></i>
                    <span class="text-gray-500">Preguntando sobre:</span>
                    <span id="chatCarreraNombre" class="font-semibold text-white truncate"></span>
                </div>
            </div>

            <div id="chatMensajes" class="flex-1 overflow-y-auto p-4 space-y-3 scroll-smooth">
                <div class="text-center py-4">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-tec-500/20 to-valle-500/20 border border-white/10 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-lightbulb text-valle-400 text-xl"></i>
                    </div>
                    <p class="text-sm font-semibold text-white mb-1">¡Hola! Soy tu asistente vocacional</p>
                    <p class="text-[11px] text-gray-400 leading-relaxed max-w-xs mx-auto mb-4">
                        Pregúntame lo que quieras sobre las carreras. Respondo con la información oficial registrada.
                    </p>
                    <div class="space-y-2 text-left max-w-xs mx-auto">
                        <p class="text-[10px] uppercase tracking-wider text-gray-500 text-center mb-2">Sugerencias rápidas</p>

                        <button type="button" onclick="preguntaRapida('¿Dónde puedo estudiar esta carrera en México?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-map-marker-alt text-tec-400 mr-2 text-[10px]"></i>
                            ¿Dónde puedo estudiarla?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿Cuánto dura la carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-clock text-valle-400 mr-2 text-[10px]"></i>
                            ¿Cuánto dura?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿Qué campo laboral tiene esta carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-briefcase text-yellow-400 mr-2 text-[10px]"></i>
                            ¿Qué campo laboral tiene?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿De qué trata esta carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-book text-purple-400 mr-2 text-[10px]"></i>
                            ¿De qué trata?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿Qué universidades cerca de Valle de Bravo, Estado de México, imparten esta carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-location-dot text-green-400 mr-2 text-[10px]"></i>
                            ¿Hay cerca de Valle de Bravo?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿Qué universidades públicas imparten esta carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-landmark text-teal-400 mr-2 text-[10px]"></i>
                            ¿Cuáles son públicas?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿Qué universidades privadas imparten esta carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-building text-pink-400 mr-2 text-[10px]"></i>
                            ¿Cuáles son privadas?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿Qué requisitos necesito para entrar a esta carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-clipboard-check text-blue-400 mr-2 text-[10px]"></i>
                            ¿Qué requisitos necesito?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿Cuál es la mejor universidad para esta carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-star text-amber-400 mr-2 text-[10px]"></i>
                            ¿Cuál es la mejor?
                        </button>

                        <button type="button" onclick="preguntaRapida('ayuda')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-circle-question text-gray-400 mr-2 text-[10px]"></i>
                            ¿Qué más puedo preguntar?
                        </button>
                    </div>
                </div>
            </div>

            <div class="p-3 border-t border-white/10 flex-shrink-0">
                <div class="flex gap-2">
                    <input type="text"
                           id="chatInput"
                           placeholder="Escribe tu pregunta..."
                           maxlength="500"
                           autocomplete="off"
                           class="flex-1 bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-tec-400 focus:ring-2 focus:ring-tec-500/20 transition-all">
                    <button type="button"
                            id="chatEnviar"
                            onclick="enviarPregunta()"
                            class="w-11 h-11 rounded-xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center text-white shadow-lg shadow-tec-500/30 hover:scale-105 transition-transform disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="fas fa-paper-plane text-sm"></i>
                    </button>
                </div>
                <p class="text-[9px] text-gray-500 text-center mt-2">
                    Respuestas basadas en la información oficial de Inspiratec
                </p>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT PRINCIPAL -->
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

            const colorMap = {
                R: { bg: 'rgba(239, 68, 68, 0.85)', border: 'rgb(239, 68, 68)' },
                I: { bg: 'rgba(59, 130, 246, 0.85)', border: 'rgb(59, 130, 246)' },
                A: { bg: 'rgba(139, 92, 246, 0.85)', border: 'rgb(139, 92, 246)' },
                S: { bg: 'rgba(16, 185, 129, 0.85)', border: 'rgb(16, 185, 129)' },
                E: { bg: 'rgba(245, 158, 11, 0.85)', border: 'rgb(245, 158, 11)' },
                C: { bg: 'rgba(99, 102, 241, 0.85)', border: 'rgb(99, 102, 241)' },
            };

            const backgroundColors = categorias.map(cat =>
                topCategorias.includes(cat) ? colorMap[cat].bg : 'rgba(255, 255, 255, 0.15)'
            );
            const borderColors = categorias.map(cat =>
                topCategorias.includes(cat) ? colorMap[cat].border : 'rgba(255, 255, 255, 0.4)'
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
                        borderRadius: 10,
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
                            padding: 12,
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    return `Puntuación: ${context.parsed.y} pts`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: Math.max(...puntos) + 2,
                            grid: { color: 'rgba(255, 255, 255, 0.05)', drawBorder: false },
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.4)',
                                font: { size: 10 },
                                callback: function(value) { return value + ' pts'; }
                            }
                        },
                        x: {
                            grid: { display: false, drawBorder: false },
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.6)',
                                font: { size: 10, weight: 'bold' }
                            }
                        }
                    },
                    animation: { duration: 1800, easing: 'easeOutQuart' }
                }
            });
        });
    </script>

    <!-- JAVASCRIPT CHAT VOCACIONAL -->
    <script>
    (function() {
        'use strict';

        let chatCarreraActual = null;
        let chatTestId = null;
        let chatEnviando = false;

        const chatModal = document.getElementById('chatModal');
        const chatMensajes = document.getElementById('chatMensajes');
        const chatInput = document.getElementById('chatInput');
        const chatEnviar = document.getElementById('chatEnviar');
        const chatCarreraChip = document.getElementById('chatCarreraChip');
        const chatCarreraNombre = document.getElementById('chatCarreraNombre');
        const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.content;

        window.abrirChat = function(carrera, testId) {
            const cambioDeCarrera = chatCarreraActual !== carrera;

            chatCarreraActual = carrera;
            chatTestId = testId;

            if (carrera) {
                chatCarreraChip.classList.remove('hidden');
                chatCarreraNombre.textContent = carrera;
            } else {
                chatCarreraChip.classList.add('hidden');
            }

            // Limpiar si cambió de carrera o si no hay carrera seleccionada
            if (cambioDeCarrera || !carrera) {
                limpiarChat();
            }

            chatModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            setTimeout(() => chatInput.focus(), 200);
        };

        window.cerrarChat = function() {
            chatModal.classList.add('hidden');
            document.body.style.overflow = '';
        };

        window.preguntaRapida = function(texto) {
            chatInput.value = texto;
            enviarPregunta();
        };

        window.enviarPregunta = async function() {
            const pregunta = chatInput.value.trim();
            if (!pregunta || chatEnviando) return;

            if (!chatCarreraActual) {
                agregarMensaje('assistant', 'Por favor, primero selecciona una carrera tocando el botón "Preguntar a la IA" en alguna tarjeta.');
                return;
            }

            chatEnviando = true;
            chatEnviar.disabled = true;

            agregarMensaje('user', pregunta);
            chatInput.value = '';

            const loaderId = agregarLoader();

            try {
                const response = await fetch('{{ route("chat.carrera") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': CSRF_TOKEN,
                    },
                    body: JSON.stringify({
                        carrera:  chatCarreraActual,
                        pregunta: pregunta,
                        test_id:  chatTestId,
                    }),
                });

                if (!response.ok) {
                    throw new Error('HTTP ' + response.status);
                }

                const data = await response.json();
                quitarLoader(loaderId);

                if (data.success) {
                    agregarMensaje('assistant', data.respuesta);
                } else {
                    agregarMensaje('assistant', data.respuesta || 'Hubo un error.');
                }
            } catch (error) {
                console.error('Error:', error);
                quitarLoader(loaderId);
                agregarMensaje('assistant', 'Hubo un problema de conexión. Intenta de nuevo.');
            } finally {
                chatEnviando = false;
                chatEnviar.disabled = false;
                chatInput.focus();
            }
        };

        function agregarMensaje(tipo, texto) {
            const wrapper = document.createElement('div');
            wrapper.className = tipo === 'user' ? 'flex justify-end' : 'flex justify-start';

            const contenido = tipo === 'user'
                ? escapeHtml(texto)
                : sanitizarHtmlAsistente(texto);

            wrapper.innerHTML = `
                <div class="${tipo === 'user'
                    ? 'bg-gradient-to-br from-tec-500 to-valle-500 text-white max-w-[85%] rounded-2xl rounded-br-sm px-4 py-2.5 text-sm leading-relaxed shadow-lg shadow-tec-500/20'
                    : 'bg-white/[0.06] border border-white/10 text-gray-200 max-w-[90%] rounded-2xl rounded-bl-sm px-4 py-2.5 text-sm leading-relaxed chat-response'}">
                    ${contenido}
                </div>
            `;
            chatMensajes.appendChild(wrapper);
            chatMensajes.scrollTop = chatMensajes.scrollHeight;
        }

        function agregarLoader() {
            const id = 'loader-' + Date.now();
            const wrapper = document.createElement('div');
            wrapper.id = id;
            wrapper.className = 'flex justify-start';
            wrapper.innerHTML = `
                <div class="bg-white/[0.06] border border-white/10 rounded-2xl rounded-bl-sm px-4 py-3 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-tec-400 animate-bounce" style="animation-delay:0ms"></span>
                    <span class="w-1.5 h-1.5 rounded-full bg-tec-400 animate-bounce" style="animation-delay:150ms"></span>
                    <span class="w-1.5 h-1.5 rounded-full bg-tec-400 animate-bounce" style="animation-delay:300ms"></span>
                    <span class="text-[10px] text-gray-400 ml-1">Consultando información...</span>
                </div>
            `;
            chatMensajes.appendChild(wrapper);
            chatMensajes.scrollTop = chatMensajes.scrollHeight;
            return id;
        }

        function quitarLoader(id) {
            const el = document.getElementById(id);
            if (el) el.remove();
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML.replace(/\n/g, '<br>');
        }

        /**
         * Permite solo etiquetas HTML seguras en respuestas del asistente.
         */
        function sanitizarHtmlAsistente(html) {
            const permitidas = ['BR', 'STRONG', 'EM', 'B', 'I', 'U', 'P', 'UL', 'OL', 'LI', 'A', 'SPAN', 'DIV'];

            const temp = document.createElement('div');
            temp.innerHTML = html;

            const walker = document.createTreeWalker(temp, NodeFilter.SHOW_ELEMENT);
            const aEliminar = [];

            while (walker.nextNode()) {
                const nodo = walker.currentNode;

                if (!permitidas.includes(nodo.tagName)) {
                    aEliminar.push(nodo);
                    continue;
                }

                Array.from(nodo.attributes).forEach(attr => {
                    const nombre = attr.name.toLowerCase();

                    if (nodo.tagName === 'A' && (nombre === 'href' || nombre === 'target' || nombre === 'rel' || nombre === 'style')) {
                        if (nombre === 'href' && !/^https?:\/\//i.test(attr.value)) {
                            nodo.removeAttribute('href');
                        }
                        if (nombre === 'target' && attr.value !== '_blank') {
                            nodo.removeAttribute('target');
                        }
                        return;
                    }

                    if (nombre === 'style') {
                        const estilo = attr.value.toLowerCase();
                        if (!/^[a-z\-\s:#;0-9.,()]+$/i.test(estilo)) {
                            nodo.removeAttribute('style');
                        }
                        return;
                    }

                    nodo.removeAttribute(attr.name);
                });
            }

            aEliminar.forEach(n => {
                if (n.parentNode) {
                    const texto = document.createTextNode(n.textContent);
                    n.parentNode.replaceChild(texto, n);
                }
            });

            return temp.innerHTML;
        }

        function limpiarChat() {
            if (!chatMensajes) return;

            chatMensajes.innerHTML = `
                <div class="text-center py-4">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-tec-500/20 to-valle-500/20 border border-white/10 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-lightbulb text-valle-400 text-xl"></i>
                    </div>
                    <p class="text-sm font-semibold text-white mb-1">¡Hola! Soy tu asistente vocacional</p>
                    <p class="text-[11px] text-gray-400 leading-relaxed max-w-xs mx-auto mb-4">
                        Pregúntame lo que quieras sobre las carreras. Respondo con la información oficial registrada.
                    </p>
                    <div class="space-y-2 text-left max-w-xs mx-auto">
                        <p class="text-[10px] uppercase tracking-wider text-gray-500 text-center mb-2">Sugerencias rápidas</p>

                        <button type="button" onclick="preguntaRapida('¿Dónde puedo estudiar esta carrera en México?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-map-marker-alt text-tec-400 mr-2 text-[10px]"></i>
                            ¿Dónde puedo estudiarla?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿Cuánto dura la carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-clock text-valle-400 mr-2 text-[10px]"></i>
                            ¿Cuánto dura?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿Qué campo laboral tiene esta carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-briefcase text-yellow-400 mr-2 text-[10px]"></i>
                            ¿Qué campo laboral tiene?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿De qué trata esta carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-book text-purple-400 mr-2 text-[10px]"></i>
                            ¿De qué trata?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿Qué universidades cerca de Valle de Bravo, Estado de México, imparten esta carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-location-dot text-green-400 mr-2 text-[10px]"></i>
                            ¿Hay cerca de Valle de Bravo?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿Qué universidades públicas imparten esta carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-landmark text-teal-400 mr-2 text-[10px]"></i>
                            ¿Cuáles son públicas?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿Qué universidades privadas imparten esta carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-building text-pink-400 mr-2 text-[10px]"></i>
                            ¿Cuáles son privadas?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿Qué requisitos necesito para entrar a esta carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-clipboard-check text-blue-400 mr-2 text-[10px]"></i>
                            ¿Qué requisitos necesito?
                        </button>

                        <button type="button" onclick="preguntaRapida('¿Cuál es la mejor universidad para esta carrera?')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-star text-amber-400 mr-2 text-[10px]"></i>
                            ¿Cuál es la mejor?
                        </button>

                        <button type="button" onclick="preguntaRapida('ayuda')"
                                class="w-full text-left px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs text-gray-300 transition-all">
                            <i class="fas fa-circle-question text-gray-400 mr-2 text-[10px]"></i>
                            ¿Qué más puedo preguntar?
                        </button>
                    </div>
                </div>
            `;
        }

        chatInput?.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                enviarPregunta();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !chatModal.classList.contains('hidden')) {
                cerrarChat();
            }
        });
    })();
    </script>
</body>
</html>