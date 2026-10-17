<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta · Inspiratec | TESVB Valle de Bravo</title>
    <meta name="description" content="Crea tu cuenta en Inspiratec y comienza tu test vocacional RIASEC.">

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
                        'float': 'float 6s ease-in-out infinite',
                        'blob': 'blob 15s ease-in-out infinite',
                        'gradient': 'gradient 6s ease infinite',
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
        .typewriter-wrap {
            display: inline-block;
            position: relative;
        }
        .typewriter-text { display: inline-block; }
        .typewriter-cursor {
            display: inline-block;
            width: 3px;
            height: 0.85em;
            background: linear-gradient(180deg, #4db3ff, #4dbe4d);
            margin-left: 6px;
            vertical-align: baseline;
            border-radius: 2px;
            animation: blink 0.9s step-end infinite;
            box-shadow: 0 0 8px rgba(77, 190, 77, 0.6);
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
        .typewriter-cursor-sm {
            width: 2px;
            height: 0.9em;
            margin-left: 3px;
            box-shadow: 0 0 6px rgba(255, 255, 255, 0.6);
            background: rgba(255, 255, 255, 0.85);
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

        .glass-input {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.09);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            height: 3.25rem;
        }
        .glass-input::placeholder { color: rgba(255, 255, 255, 0.3); }
        .glass-input:hover:not(:focus) {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.15);
        }
        .glass-input:focus {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(0, 128, 255, 0.55);
            box-shadow: 0 0 0 4px rgba(0, 128, 255, 0.12);
            outline: none;
        }
        .glass-input.error {
            border-color: rgba(239, 68, 68, 0.55);
            background: rgba(239, 68, 68, 0.04);
        }
        .glass-input.error:focus {
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.12);
        }

        /* Textarea */
        textarea.glass-input {
            height: auto;
            min-height: 5rem;
            padding-top: 0.875rem;
            padding-bottom: 0.875rem;
            resize: none;
            line-height: 1.5;
        }

        /* Select */
        select.glass-input {
            appearance: none;
            -webkit-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='rgba(255,255,255,0.5)' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 12px;
            padding-right: 2.5rem;
            cursor: pointer;
        }
        select.glass-input option {
            background: #0a1220;
            color: #fff;
        }

        /* ============================================
           INPUT GROUP
           ============================================ */
        .input-group { position: relative; }
        .input-group .input-icon {
            position: absolute;
            left: 1.125rem;
            top: 1.625rem;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.35);
            transition: color 0.25s ease;
            font-size: 0.875rem;
            pointer-events: none;
            z-index: 2;
            line-height: 1;
        }
        .input-group:focus-within .input-icon { color: #4db3ff; }
        .input-group input.has-icon { padding-left: 3rem; }
        .input-group input.has-toggle { padding-right: 3rem; }

        /* Iconos centrados para textarea y select */
        .input-group .input-icon-top {
            top: 1.5rem;
            transform: translateY(0);
        }

        .password-toggle {
            position: absolute;
            right: 0.75rem;
            top: 1.625rem;
            transform: translateY(-50%);
            width: 2rem;
            height: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.4);
            cursor: pointer;
            transition: all 0.25s ease;
            background: transparent;
            border: none;
            border-radius: 0.5rem;
            z-index: 2;
        }
        .password-toggle:hover {
            color: #4db3ff;
            background: rgba(255, 255, 255, 0.05);
        }

        /* ============================================
           LABELS
           ============================================ */
        .form-label {
            display: block;
            font-size: 0.8125rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 0.5rem;
            letter-spacing: 0.01em;
        }

        /* ============================================
           SECTION DIVIDER
           ============================================ */
        .section-divider {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 1.75rem 0 1.25rem;
        }
        .section-divider::before,
        .section-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
        }
        .section-divider span {
            font-size: 0.6875rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.4);
            font-weight: 600;
            white-space: nowrap;
        }
        .section-divider i {
            font-size: 0.6875rem;
            color: rgba(77, 179, 255, 0.7);
            margin-right: 0.375rem;
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
            height: 3.25rem;
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
           ALERTAS
           ============================================ */
        .alert {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 0.875rem 1rem;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            line-height: 1.4;
        }
        .alert-success {
            background: rgba(34, 197, 94, 0.08);
            border: 1px solid rgba(34, 197, 94, 0.25);
            color: #86efac;
        }
        .alert-error {
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.25);
            color: #fca5a5;
        }
        .alert i {
            font-size: 0.875rem;
            margin-top: 0.15rem;
            flex-shrink: 0;
        }

        /* ============================================
           FIELD ERROR
           ============================================ */
        .field-error {
            display: flex;
            align-items: center;
            gap: 0.375rem;
            margin-top: 0.5rem;
            font-size: 0.75rem;
            color: #fca5a5;
        }
        .field-error i { font-size: 0.6875rem; }

        /* ============================================
           INFO CHIPS
           ============================================ */
        .info-chip {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem 1rem;
            border-radius: 0.875rem;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.07);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .info-chip:hover {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(0, 128, 255, 0.25);
            transform: translateY(-2px);
        }
        .info-chip .chip-icon {
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 0.625rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
            font-size: 0.8125rem;
        }
        .info-chip:hover .chip-icon { transform: scale(1.05); }
        .chip-icon-tec {
            background: rgba(0, 128, 255, 0.12);
            color: #4db3ff;
            border: 1px solid rgba(0, 128, 255, 0.25);
        }
        .chip-icon-valle {
            background: rgba(77, 190, 77, 0.12);
            color: #71cb71;
            border: 1px solid rgba(77, 190, 77, 0.25);
        }

        /* ============================================
           PASSWORD STRENGTH
           ============================================ */
        .strength-bar {
            display: flex;
            gap: 0.25rem;
            margin-top: 0.5rem;
        }
        .strength-segment {
            flex: 1;
            height: 3px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 2px;
            transition: background 0.3s ease;
        }
        .strength-weak { background: #ef4444; }
        .strength-fair { background: #f59e0b; }
        .strength-good { background: #eab308; }
        .strength-strong { background: #22c55e; }
        .strength-text {
            font-size: 0.6875rem;
            margin-top: 0.375rem;
            color: rgba(255, 255, 255, 0.5);
        }
        .strength-text span { font-weight: 600; }
        .strength-text.weak span { color: #ef4444; }
        .strength-text.fair span { color: #f59e0b; }
        .strength-text.good span { color: #eab308; }
        .strength-text.strong span { color: #22c55e; }

        /* ============================================
           CHAR COUNTER
           ============================================ */
        .char-counter {
            font-size: 0.6875rem;
            color: rgba(255, 255, 255, 0.4);
            text-align: right;
            margin-top: 0.375rem;
            transition: color 0.3s ease;
        }
        .char-counter.warning { color: #f59e0b; }
        .char-counter.danger { color: #ef4444; }

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
           BACK BUTTON
           ============================================ */
        .back-btn { transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); }
        .back-btn:hover .back-arrow { transform: translateX(-3px); }
        .back-arrow { transition: transform 0.3s ease; }

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

    <!-- Back button -->
    <a href="{{ url('/') }}"
       class="back-btn fixed top-5 left-5 z-50 inline-flex items-center gap-2 px-3.5 py-2 rounded-xl border border-white/10 bg-white/5 backdrop-blur-xl text-xs font-medium text-gray-300 hover:text-white hover:bg-white/10"
       aria-label="Volver al inicio">
        <i class="fas fa-arrow-left back-arrow text-[10px]"></i>
        <span class="hidden sm:inline">Volver al inicio</span>
    </a>

    <!-- ============================================
         MAIN
         ============================================ -->
    <main class="relative z-10 min-h-screen flex items-center justify-center px-4 py-16 sm:py-20">
        <div class="w-full max-w-2xl">

            <!-- ============================================
                 LOGO + HEADER
                 ============================================ -->
            <div class="text-center mb-8 animate-fade-in-down">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-3 mb-6 group">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-lg shadow-tec-500/30 group-hover:scale-105 transition-transform duration-300">
                        <i class="fas fa-graduation-cap text-lg text-white"></i>
                    </div>
                    <div class="text-left">
                        <h1 class="text-lg font-bold font-display tracking-tight leading-tight">Inspiratec</h1>
                        <p class="text-[10px] uppercase tracking-widest text-tec-300 font-medium leading-tight">TESVB · Valle de Bravo</p>
                    </div>
                </a>

                <h2 class="text-3xl sm:text-4xl font-extrabold font-display mb-3 tracking-tight leading-tight">
                    Crea tu
                    <span class="typewriter-wrap text-gradient">
                        <span class="typewriter-text" id="titleTypewriter"></span><span class="typewriter-cursor"></span>
                    </span>
                </h2>
                <p class="text-gray-400 text-sm sm:text-base max-w-md mx-auto leading-relaxed">
                    Comienza tu camino hacia una decisión vocacional bien informada.
                </p>
            </div>

            <!-- ============================================
                 CARD PRINCIPAL
                 ============================================ -->
            <div class="glass-card rounded-3xl overflow-hidden p-7 sm:p-10 animate-fade-in-up d-200">

                <!-- ==========================================
                     ALERTAS
                     ========================================== -->
                @if(session('status'))
                <div class="alert alert-success mb-5 animate-fade-in-down">
                    <i class="fas fa-check-circle"></i>
                    <div>{{ session('status') }}</div>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-error mb-5 animate-fade-in-down">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>{{ session('error') }}</div>
                </div>
                @endif

                <!-- ==========================================
                     FORM
                     ========================================== -->
                <form method="POST" action="{{ route('register') }}" class="space-y-5" id="registerForm">
                    @csrf

                    <!-- ==================================
                         SECCIÓN: DATOS PERSONALES
                         ================================== -->
                    <div class="section-divider">
                        <span><i class="fas fa-user"></i>Datos personales</span>
                    </div>

                    <!-- Nombre + Apellido Paterno -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 animate-fade-in-up d-300">
                        <div>
                            <label for="nombre" class="form-label">Nombre(s)</label>
                            <div class="input-group">
                                <i class="fas fa-user input-icon"></i>
                                <input
                                    id="nombre"
                                    type="text"
                                    name="nombre"
                                    value="{{ old('nombre') }}"
                                    required
                                    autofocus
                                    autocomplete="given-name"
                                    placeholder="Tu nombre"
                                    class="glass-input has-icon w-full px-4 rounded-xl text-white text-sm @error('nombre') error @enderror">
                            </div>
                            @error('nombre')
                                <div class="field-error animate-fade-in-down">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div>
                            <label for="ap" class="form-label">Apellido paterno</label>
                            <div class="input-group">
                                <i class="fas fa-user input-icon"></i>
                                <input
                                    id="ap"
                                    type="text"
                                    name="ap"
                                    value="{{ old('ap') }}"
                                    required
                                    autocomplete="family-name"
                                    placeholder="Tu apellido"
                                    class="glass-input has-icon w-full px-4 rounded-xl text-white text-sm @error('ap') error @enderror">
                            </div>
                            @error('ap')
                                <div class="field-error animate-fade-in-down">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Apellido Materno + Edad -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 animate-fade-in-up d-400">
                        <div>
                            <label for="am" class="form-label">Apellido materno</label>
                            <div class="input-group">
                                <i class="fas fa-user input-icon"></i>
                                <input
                                    id="am"
                                    type="text"
                                    name="am"
                                    value="{{ old('am') }}"
                                    required
                                    placeholder="Tu apellido"
                                    class="glass-input has-icon w-full px-4 rounded-xl text-white text-sm @error('am') error @enderror">
                            </div>
                            @error('am')
                                <div class="field-error animate-fade-in-down">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div>
                            <label for="edad" class="form-label">Edad</label>
                            <div class="input-group">
                                <i class="fas fa-birthday-cake input-icon"></i>
                                <input
                                    id="edad"
                                    type="number"
                                    name="edad"
                                    value="{{ old('edad') }}"
                                    min="1"
                                    max="120"
                                    required
                                    placeholder="Ej. 17"
                                    class="glass-input has-icon w-full px-4 rounded-xl text-white text-sm @error('edad') error @enderror">
                            </div>
                            @error('edad')
                                <div class="field-error animate-fade-in-down">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Género + Nivel Educativo -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 animate-fade-in-up d-400">
                        <div>
                            <label for="genero_id" class="form-label">Género</label>
                            <div class="input-group">
                                <i class="fas fa-venus-mars input-icon"></i>
                                <select
                                    id="genero_id"
                                    name="genero_id"
                                    required
                                    class="glass-input has-icon w-full px-4 rounded-xl text-white text-sm @error('genero_id') error @enderror">
                                    <option value="">Selecciona una opción</option>
                                    @foreach($generos as $genero)
                                        <option value="{{ $genero->id }}" {{ old('genero_id') == $genero->id ? 'selected' : '' }}>
                                            {{ $genero->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('genero_id')
                                <div class="field-error animate-fade-in-down">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div>
                            <label for="nivel_educativo_id" class="form-label">Nivel educativo</label>
                            <div class="input-group">
                                <i class="fas fa-graduation-cap input-icon"></i>
                                <select
                                    id="nivel_educativo_id"
                                    name="nivel_educativo_id"
                                    required
                                    class="glass-input has-icon w-full px-4 rounded-xl text-white text-sm @error('nivel_educativo_id') error @enderror">
                                    <option value="">Selecciona una opción</option>
                                    @foreach($nivelesEducativos as $nivel)
                                        <option value="{{ $nivel->id }}" {{ old('nivel_educativo_id') == $nivel->id ? 'selected' : '' }}>
                                            {{ $nivel->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('nivel_educativo_id')
                                <div class="field-error animate-fade-in-down">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- ==================================
                         SECCIÓN: TUS INTERESES
                         ================================== -->
                    <div class="section-divider">
                        <span><i class="fas fa-heart"></i>Tus intereses</span>
                    </div>

                    <div class="animate-fade-in-up d-500">
                        <label for="intereses" class="form-label">Cuéntanos qué te gusta</label>
                        <div class="input-group">
                            <textarea
                                id="intereses"
                                name="intereses"
                                rows="3"
                                required
                                maxlength="500"
                                placeholder="Ej. Me gusta programar, resolver problemas, dibujar, ayudar a las personas..."
                                class="glass-input w-full px-4 rounded-xl text-white text-sm @error('intereses') error @enderror">{{ old('intereses') }}</textarea>
                        </div>
                        <div class="char-counter" id="charCounter">0 / 500</div>
                        @error('intereses')
                            <div class="field-error animate-fade-in-down">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- ==================================
                         SECCIÓN: TU CUENTA
                         ================================== -->
                    <div class="section-divider">
                        <span><i class="fas fa-lock"></i>Tu cuenta</span>
                    </div>

                    <!-- Email -->
                    <div class="animate-fade-in-up d-500">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <div class="input-group">
                            <i class="fas fa-envelope input-icon"></i>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                                placeholder="tu@correo.com"
                                class="glass-input has-icon w-full px-4 rounded-xl text-white text-sm @error('email') error @enderror">
                        </div>
                        @error('email')
                            <div class="field-error animate-fade-in-down">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Password + Confirm -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 animate-fade-in-up d-500">
                        <div>
                            <label for="password" class="form-label">Contraseña</label>
                            <div class="input-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Mínimo 8 caracteres"
                                    class="glass-input has-icon has-toggle w-full px-4 rounded-xl text-white text-sm @error('password') error @enderror">
                                <button type="button"
                                        class="password-toggle"
                                        data-target="password"
                                        aria-label="Mostrar u ocultar contraseña">
                                    <i class="fas fa-eye text-xs"></i>
                                </button>
                            </div>
                            <!-- Barra de fuerza -->
                            <div class="strength-bar" id="strengthBar">
                                <div class="strength-segment"></div>
                                <div class="strength-segment"></div>
                                <div class="strength-segment"></div>
                                <div class="strength-segment"></div>
                            </div>
                            <div class="strength-text" id="strengthText">Ingresa una contraseña segura</div>
                            @error('password')
                                <div class="field-error animate-fade-in-down">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                            <div class="input-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Repite tu contraseña"
                                    class="glass-input has-icon has-toggle w-full px-4 rounded-xl text-white text-sm">
                                <button type="button"
                                        class="password-toggle"
                                        data-target="password_confirmation"
                                        aria-label="Mostrar u ocultar contraseña">
                                    <i class="fas fa-eye text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- SUBMIT -->
                    <div class="pt-2 animate-fade-in-up d-500">
                        <button type="submit"
                                id="submitBtn"
                                class="btn-primary w-full rounded-xl text-white font-semibold text-sm tracking-wide shadow-lg shadow-tec-500/25">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                <i class="fas fa-user-plus text-xs"></i>
                                <span id="btnText">Crear mi cuenta</span>
                            </span>
                        </button>
                    </div>

                    <!-- LOGIN LINK -->
                    <div class="text-center pt-2 animate-fade-in-up d-500">
                        <p class="text-sm text-gray-400">
                            ¿Ya tienes una cuenta?
                            <a href="{{ route('login') }}"
                               class="text-valle-300 hover:text-valle-200 font-semibold transition-colors duration-200 ml-1 whitespace-nowrap">
                                Inicia sesión →
                            </a>
                        </p>
                    </div>

                </form>

                <!-- ==========================================
                     CITA CON TYPEWRITER
                     ========================================== -->
                <div class="mt-8 pt-6 border-t border-white/10 animate-fade-in-up d-500">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-quote-left text-white/25 text-sm flex-shrink-0 mt-0.5"></i>
                        <p class="text-gray-400 text-xs italic leading-relaxed min-h-[2.5rem]">
                            <span id="quoteTypewriter"></span><span class="typewriter-cursor typewriter-cursor-sm"></span>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Footer -->
            <p class="text-center text-gray-500 text-xs mt-8 animate-fade-in-up d-500 leading-relaxed">
                © {{ date('Y') }} Tecnológico de Estudios Superiores de Valle de Bravo
                <span class="mx-1.5 opacity-40">·</span>
                <a href="{{ url('/') }}" class="hover:text-tec-300 transition-colors">Inspiratec</a>
            </p>

        </div>
    </main>

    <!-- ============================================
         JAVASCRIPT
         ============================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            'use strict';

            /* ============================================
               TYPEWRITER — TÍTULO
               ============================================ */
            const titleElement = document.getElementById('titleTypewriter');
            const titlePhrases = [' cuenta', ' perfil', ' inspiración', ' futuro'];
            let titleIndex = 0;
            let titleCharIndex = 0;
            let titleIsDeleting = false;

            function typeTitle() {
                const current = titlePhrases[titleIndex];

                if (titleIsDeleting) {
                    titleCharIndex--;
                    titleElement.textContent = current.substring(0, titleCharIndex);
                    if (titleCharIndex <= 0) {
                        titleIsDeleting = false;
                        titleIndex = (titleIndex + 1) % titlePhrases.length;
                        setTimeout(typeTitle, 500);
                    } else {
                        setTimeout(typeTitle, 40);
                    }
                } else {
                    titleCharIndex++;
                    titleElement.textContent = current.substring(0, titleCharIndex);
                    if (titleCharIndex >= current.length) {
                        titleIsDeleting = true;
                        setTimeout(typeTitle, 2200);
                    } else {
                        setTimeout(typeTitle, 95);
                    }
                }
            }
            if (titleElement) typeTitle();

            /* ============================================
               TYPEWRITER — CITA
               ============================================ */
            const quoteElement = document.getElementById('quoteTypewriter');
            const quotePhrases = [
                'El primer paso para elegir bien es conocerte a ti mismo.',
                'Tu futuro profesional comienza con una buena pregunta.',
                'No hay decisiones pequeñas cuando se trata de tu vocación.',
                'Descubrir tus intereses es el mejor punto de partida.'
            ];
            let quoteIndex = 0;
            let quoteCharIndex = 0;
            let quoteIsDeleting = false;

            function typeQuote() {
                const current = quotePhrases[quoteIndex];

                if (quoteIsDeleting) {
                    quoteCharIndex--;
                    quoteElement.textContent = current.substring(0, quoteCharIndex);
                    if (quoteCharIndex <= 0) {
                        quoteIsDeleting = false;
                        quoteIndex = (quoteIndex + 1) % quotePhrases.length;
                        setTimeout(typeQuote, 700);
                    } else {
                        setTimeout(typeQuote, 25);
                    }
                } else {
                    quoteCharIndex++;
                    quoteElement.textContent = current.substring(0, quoteCharIndex);
                    if (quoteCharIndex >= current.length) {
                        quoteIsDeleting = true;
                        setTimeout(typeQuote, 3000);
                    } else {
                        setTimeout(typeQuote, 55);
                    }
                }
            }
            if (quoteElement) setTimeout(typeQuote, 1200);

            /* ============================================
               PASSWORD TOGGLE (para ambos campos)
               ============================================ */
            document.querySelectorAll('.password-toggle').forEach(btn => {
                btn.addEventListener('click', function() {
                    const targetId = this.dataset.target;
                    const input = document.getElementById(targetId);
                    const icon = this.querySelector('i');
                    if (!input) return;

                    const isPassword = input.type === 'password';
                    input.type = isPassword ? 'text' : 'password';
                    icon.classList.toggle('fa-eye');
                    icon.classList.toggle('fa-eye-slash');
                    input.focus();
                });
            });

            /* ============================================
               PASSWORD STRENGTH METER
               ============================================ */
            const passwordInput = document.getElementById('password');
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');
            const segments = strengthBar ? strengthBar.querySelectorAll('.strength-segment') : [];

            function calculateStrength(pwd) {
                let score = 0;
                if (pwd.length >= 8) score++;
                if (pwd.length >= 12) score++;
                if (/[A-Z]/.test(pwd)) score++;
                if (/[0-9]/.test(pwd)) score++;
                if (/[^A-Za-z0-9]/.test(pwd)) score++;

                // Normalizar a 1-4
                if (score <= 1) return 1;
                if (score === 2) return 2;
                if (score === 3) return 3;
                if (score >= 4) return 4;
                return 0;
            }

            function updateStrength() {
                const pwd = passwordInput.value;
                const level = pwd.length === 0 ? 0 : calculateStrength(pwd);

                segments.forEach((seg, i) => {
                    seg.className = 'strength-segment';
                    if (i < level) {
                        if (level === 1) seg.classList.add('strength-weak');
                        else if (level === 2) seg.classList.add('strength-fair');
                        else if (level === 3) seg.classList.add('strength-good');
                        else if (level === 4) seg.classList.add('strength-strong');
                    }
                });

                strengthText.className = 'strength-text';
                if (pwd.length === 0) {
                    strengthText.textContent = 'Ingresa una contraseña segura';
                } else if (level === 1) {
                    strengthText.classList.add('weak');
                    strengthText.innerHTML = 'Contraseña <span>débil</span>';
                } else if (level === 2) {
                    strengthText.classList.add('fair');
                    strengthText.innerHTML = 'Contraseña <span>regular</span>';
                } else if (level === 3) {
                    strengthText.classList.add('good');
                    strengthText.innerHTML = 'Contraseña <span>buena</span>';
                } else if (level === 4) {
                    strengthText.classList.add('strong');
                    strengthText.innerHTML = 'Contraseña <span>fuerte</span>';
                }
            }

            passwordInput?.addEventListener('input', updateStrength);

            /* ============================================
               CHAR COUNTER — INTERESES
               ============================================ */
            const interesesInput = document.getElementById('intereses');
            const charCounter = document.getElementById('charCounter');
            const maxChars = 500;

            function updateCharCounter() {
                const len = interesesInput.value.length;
                charCounter.textContent = `${len} / ${maxChars}`;
                charCounter.classList.remove('warning', 'danger');
                if (len > maxChars * 0.9) charCounter.classList.add('danger');
                else if (len > maxChars * 0.7) charCounter.classList.add('warning');
            }

            interesesInput?.addEventListener('input', updateCharCounter);
            updateCharCounter();

            /* ============================================
               SUBMIT LOADING STATE
               ============================================ */
            const registerForm = document.getElementById('registerForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');

            registerForm?.addEventListener('submit', function() {
                submitBtn.disabled = true;
                btnText.textContent = 'Creando cuenta...';
                const icon = submitBtn.querySelector('i');
                if (icon) {
                    icon.classList.remove('fa-user-plus');
                    icon.classList.add('fa-circle-notch', 'fa-spin');
                }
                setTimeout(() => {
                    if (submitBtn.disabled) {
                        submitBtn.disabled = false;
                        btnText.textContent = 'Crear mi cuenta';
                        if (icon) {
                            icon.classList.remove('fa-circle-notch', 'fa-spin');
                            icon.classList.add('fa-user-plus');
                        }
                    }
                }, 10000);
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

            /* ============================================
               AUTO-DISMISS ALERTS
               ============================================ */
            document.querySelectorAll('.alert').forEach(msg => {
                setTimeout(() => {
                    msg.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                    msg.style.opacity = '0';
                    msg.style.transform = 'translateY(-8px)';
                    setTimeout(() => msg.remove(), 400);
                }, 6000);
            });

        });
    </script>
</body>
</html>