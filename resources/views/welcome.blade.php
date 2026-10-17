<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspiratec | Orientación Vocacional · TESVB Valle de Bravo</title>
    <meta name="description" content="Descubre tu vocación con el test RIASEC. Plataforma de orientación vocacional para estudiantes de nivel medio superior del TESVB Valle de Bravo.">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                        display: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
                        mono: ['"Space Grotesk"', 'monospace'],
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
                        'fade-in-up': 'fadeInUp 0.9s cubic-bezier(0.16, 1, 0.3, 1)',
                        'fade-in-down': 'fadeInDown 0.9s cubic-bezier(0.16, 1, 0.3, 1)',
                        'float': 'float 6s ease-in-out infinite',
                        'blob': 'blob 15s ease-in-out infinite',
                        'shine': 'shine 3s linear infinite',
                        'gradient': 'gradient 6s ease infinite',
                        'spin-slow': 'spin 25s linear infinite',
                        'aurora': 'aurora 12s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(40px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeInDown: {
                            '0%': { opacity: '0', transform: 'translateY(-40px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        blob: {
                            '0%, 100%': { transform: 'translate(0, 0) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                        },
                        shine: {
                            '0%': { backgroundPosition: '-200% center' },
                            '100%': { backgroundPosition: '200% center' },
                        },
                        gradient: {
                            '0%, 100%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' },
                        },
                        aurora: {
                            '0%, 100%': { transform: 'translateX(-20%) rotate(0deg)', opacity: '0.3' },
                            '50%': { transform: 'translateX(20%) rotate(180deg)', opacity: '0.5' },
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
        * { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
        html { scroll-behavior: smooth; }

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
           PROGRESS BAR
           ============================================ */
        .progress-bar {
            position: fixed;
            top: 0; left: 0;
            height: 2px;
            background: linear-gradient(90deg, #0080ff, #4dbe4d);
            z-index: 9999;
            transition: width 0.1s linear;
            box-shadow: 0 0 10px rgba(0, 128, 255, 0.6);
        }

        /* ============================================
           GLASS EFFECTS
           ============================================ */
        .glass-effect {
            background: rgba(255, 255, 255, 0.035);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-strong {
            background: rgba(5, 15, 30, 0.7);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* ============================================
           NAVBAR
           ============================================ */
        .navbar { transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
        .navbar.scrolled {
            background: rgba(0, 5, 13, 0.8);
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
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .btn-primary:hover {
            background-position: 100% 50%;
            transform: translateY(-2px);
            box-shadow: 0 20px 40px -10px rgba(0, 128, 255, 0.55);
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.35), transparent);
            transition: left 0.6s ease;
        }
        .btn-primary:hover::before { left: 100%; }

        .btn-ghost {
            border: 1px solid rgba(255, 255, 255, 0.12);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-ghost:hover {
            border-color: rgba(0, 128, 255, 0.5);
            background: rgba(0, 128, 255, 0.08);
            transform: translateY(-2px);
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

        .text-gradient-static {
            background: linear-gradient(135deg, #4db3ff 0%, #71cb71 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* ============================================
           TYPEWRITER
           ============================================ */
        .typewriter-container {
            display: inline-block;
            min-height: 1.1em;
        }
        .typewriter-cursor {
            display: inline-block;
            width: 3px;
            height: 0.9em;
            background: #4dbe4d;
            margin-left: 4px;
            vertical-align: middle;
            animation: blink 0.8s step-end infinite;
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* ============================================
           FLIP CARDS
           ============================================ */
        .flip-card {
            perspective: 1500px;
            cursor: pointer;
            height: 22rem;
        }
        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            transform-style: preserve-3d;
        }
        .flip-card.flipped .flip-card-inner { transform: rotateY(180deg); }
        .flip-card-front, .flip-card-back {
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            position: absolute;
            inset: 0;
            border-radius: 1.25rem;
            overflow: hidden;
        }
        .flip-card-back { transform: rotateY(180deg); }
        .flip-card-front { transition: all 0.4s ease; }

        .flip-card[data-type="R"]:not(.flipped):hover .flip-card-front { box-shadow: 0 25px 70px -20px rgba(239, 68, 68, 0.55); border-color: rgba(239,68,68,0.3); }
        .flip-card[data-type="I"]:not(.flipped):hover .flip-card-front { box-shadow: 0 25px 70px -20px rgba(59, 130, 246, 0.55); border-color: rgba(59,130,246,0.3); }
        .flip-card[data-type="A"]:not(.flipped):hover .flip-card-front { box-shadow: 0 25px 70px -20px rgba(168, 85, 247, 0.55); border-color: rgba(168,85,247,0.3); }
        .flip-card[data-type="S"]:not(.flipped):hover .flip-card-front { box-shadow: 0 25px 70px -20px rgba(34, 197, 94, 0.55); border-color: rgba(34,197,94,0.3); }
        .flip-card[data-type="E"]:not(.flipped):hover .flip-card-front { box-shadow: 0 25px 70px -20px rgba(234, 179, 8, 0.55); border-color: rgba(234,179,8,0.3); }
        .flip-card[data-type="C"]:not(.flipped):hover .flip-card-front { box-shadow: 0 25px 70px -20px rgba(99, 102, 241, 0.55); border-color: rgba(99,102,241,0.3); }

        /* ============================================
           SCROLL ANIMATIONS
           ============================================ */
        .scroll-animate {
            opacity: 0;
            transform: translateY(60px);
            transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .scroll-animate.visible { opacity: 1; transform: translateY(0); }

        /* ============================================
           HERO IMAGE
           ============================================ */
        .hero-image {
            transform: perspective(1200px) rotateY(-10deg) rotateX(6deg);
            transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow:
                -30px 30px 60px rgba(0, 0, 0, 0.5),
                0 0 120px rgba(0, 128, 255, 0.25);
        }
        .hero-image:hover {
            transform: perspective(1200px) rotateY(-2deg) rotateX(2deg) translateY(-10px);
        }

        /* ============================================
           BLOBS
           ============================================ */
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
            top: -120px; left: -120px;
            animation: blob 16s ease-in-out infinite;
        }
        .blob-2 {
            width: 400px; height: 400px;
            background: #4dbe4d;
            bottom: 8%; right: -120px;
            animation: blob 20s ease-in-out infinite reverse;
        }
        .blob-3 {
            width: 350px; height: 350px;
            background: #4db3ff;
            top: 45%; left: 35%;
            animation: blob 22s ease-in-out infinite;
            opacity: 0.25;
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
            0% { transform: translateY(100vh) translateX(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(60px); opacity: 0; }
        }

        /* ============================================
           CURSOR GLOW (desktop only)
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
           MOBILE MENU
           ============================================ */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .mobile-menu.open { transform: translateX(0); }
        .menu-overlay {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.4s ease, visibility 0.4s ease;
        }
        .menu-overlay.open { opacity: 1; visibility: visible; }

        /* ============================================
           BENEFIT CARDS
           ============================================ */
        .benefit-card {
            position: relative;
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
        }
        .benefit-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(135deg, transparent, rgba(0,128,255,0.4), rgba(77,190,77,0.3), transparent);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }
        .benefit-card:hover::before { opacity: 1; }
        .benefit-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 35px 70px -25px rgba(0, 128, 255, 0.5);
            background: rgba(255, 255, 255, 0.055);
        }

        /* ============================================
           FAQ ACCORDION
           ============================================ */
        .faq-item {
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .faq-item.open {
            background: rgba(255,255,255,0.05);
        }
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .faq-item.open .faq-answer {
            max-height: 400px;
        }
        .faq-item.open .faq-icon {
            transform: rotate(45deg);
            background: linear-gradient(135deg, #0080ff, #4dbe4d);
        }

        /* ============================================
           CTA SHINE BUTTON
           ============================================ */
        .cta-shine {
            background: linear-gradient(90deg, #0080ff, #4dbe4d, #0080ff);
            background-size: 200% auto;
            animation: shine 3s linear infinite;
        }

        /* ============================================
           SCROLL TO TOP
           ============================================ */
        .scroll-top {
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .scroll-top.visible { opacity: 1; visibility: visible; transform: translateY(0); }

        /* ============================================
           SCROLLBAR
           ============================================ */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: #00050d; }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #0080ff, #4dbe4d);
            border-radius: 10px;
            border: 2px solid #00050d;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #4db3ff, #71cb71);
        }
        ::selection {
            background: rgba(0, 128, 255, 0.4);
            color: white;
        }

        /* ============================================
           ANIMATION DELAYS
           ============================================ */
        .animation-delay-200 { animation-delay: 200ms; }
        .animation-delay-400 { animation-delay: 400ms; }
        .animation-delay-600 { animation-delay: 600ms; }
        .animation-delay-1000 { animation-delay: 1000ms; }
        .animation-delay-2000 { animation-delay: 2000ms; }

        /* ============================================
           FLOATING BADGE
           ============================================ */
        .badge-glow {
            position: relative;
        }
        .badge-glow::after {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: inherit;
            background: linear-gradient(135deg, #0080ff, #4dbe4d);
            opacity: 0.4;
            filter: blur(8px);
            z-index: -1;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .blob, .particles, .cursor-glow { display: none !important; }
            .hero-image {
                transform: none;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            }
            .hero-image:hover { transform: translateY(-5px); }
            body::before { background-size: 40px 40px; }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen font-sans text-white overflow-x-hidden">

    <!-- Progress Bar -->
    <div class="progress-bar" id="progressBar"></div>

    <!-- Cursor Glow -->
    <div class="cursor-glow" id="cursorGlow"></div>

    <!-- Background Blobs -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <!-- Particles -->
    <div class="particles" id="particles"></div>

    <!-- ============================================
         HEADER / NAVBAR
         ============================================ -->
    <header id="navbar" class="navbar fixed top-0 left-0 right-0 z-50 py-5">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="#" class="flex items-center space-x-3 group">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-lg shadow-tec-500/30 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-graduation-cap text-lg text-white"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold font-display tracking-tight">Inspiratec</h1>
                    <p class="text-[10px] uppercase tracking-widest text-tec-300 font-medium">TESVB · Valle de Bravo</p>
                </div>
            </a>

            <nav class="hidden md:flex items-center space-x-8">
                <a href="#beneficios" class="text-sm font-medium text-gray-300 hover:text-white transition-colors duration-300 relative group">
                    Beneficios
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-tec-400 to-valle-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="#riasec" class="text-sm font-medium text-gray-300 hover:text-white transition-colors duration-300 relative group">
                    RIASEC
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-tec-400 to-valle-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="#como-funciona" class="text-sm font-medium text-gray-300 hover:text-white transition-colors duration-300 relative group">
                    Cómo funciona
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-tec-400 to-valle-400 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="#faq" class="text-sm font-medium text-gray-300 hover:text-white transition-colors duration-300 relative group">
                    FAQ
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-tec-400 to-valle-400 group-hover:w-full transition-all duration-300"></span>
                </a>
            </nav>

            <div class="hidden md:flex items-center space-x-3">
                <a href="{{ route('login') }}" class="px-5 py-2.5 text-sm font-medium text-gray-200 hover:text-white transition-colors duration-300">
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}" class="btn-primary px-6 py-2.5 text-sm font-semibold rounded-xl text-white shadow-lg shadow-tec-500/25">
                    <span class="relative z-10">Comenzar ahora <i class="fas fa-arrow-right ml-1 text-xs"></i></span>
                </a>
            </div>

            <button id="mobile-menu-button" class="md:hidden text-white text-xl w-10 h-10 flex items-center justify-center rounded-lg glass-effect" aria-label="Abrir menú">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div id="mobile-menu-overlay" class="menu-overlay fixed inset-0 bg-black/80 backdrop-blur-sm z-40"></div>
    <div id="mobile-menu" class="mobile-menu fixed top-0 left-0 h-full w-72 glass-strong z-50 p-6">
        <div class="flex justify-between items-center mb-10">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-white"></i>
                </div>
                <span class="font-bold font-display">Inspiratec</span>
            </div>
            <button id="close-mobile-menu" class="text-white text-lg w-9 h-9 flex items-center justify-center rounded-lg glass-effect" aria-label="Cerrar menú">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <nav class="space-y-1">
            <a href="#beneficios" class="flex items-center py-3 px-4 text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition-all duration-300">
                <i class="fas fa-star w-6 text-tec-400"></i>Beneficios
            </a>
            <a href="#riasec" class="flex items-center py-3 px-4 text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition-all duration-300">
                <i class="fas fa-compass w-6 text-valle-400"></i>Modelo RIASEC
            </a>
            <a href="#como-funciona" class="flex items-center py-3 px-4 text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition-all duration-300">
                <i class="fas fa-list-ol w-6 text-tec-400"></i>Cómo funciona
            </a>
            <a href="#faq" class="flex items-center py-3 px-4 text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition-all duration-300">
                <i class="fas fa-circle-question w-6 text-valle-400"></i>Preguntas frecuentes
            </a>
        </nav>

        <div class="absolute bottom-6 left-6 right-6 pt-6 border-t border-white/10 space-y-3">
            <a href="{{ route('login') }}" class="block w-full py-3 text-center text-sm font-medium text-gray-200 glass-effect rounded-xl hover:bg-white/10 transition-all duration-300">
                Iniciar Sesión
            </a>
            <a href="{{ route('register') }}" class="block w-full py-3 text-center text-sm font-semibold btn-primary rounded-xl text-white">
                <span class="relative z-10">Registrarse</span>
            </a>
        </div>
    </div>

    <!-- ============================================
         HERO SECTION
         ============================================ -->
    <section class="relative min-h-screen flex items-center pt-32 pb-20 z-10">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- Texto -->
                <div class="text-center lg:text-left animate-fade-in-up">


                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold font-display leading-[1.05] mb-6 tracking-tight">
                        Estás a punto de elegir
                        <br>
                        <span class="typewriter-container text-gradient">
                            <span id="typewriter"></span>
                            <span class="typewriter-cursor"></span>
                        </span>
                    </h1>

                    <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                        Descubre qué carrera va contigo. Orientación vocacional con el modelo <span class="text-white font-semibold">RIASEC</span>, basada para estudiantes de bachillerato que están por dar el siguiente paso.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-10">
                        <a href="{{ route('register') }}" class="btn-primary px-8 py-4 rounded-2xl font-semibold text-white shadow-xl shadow-tec-500/25 text-center">
                            <span class="relative z-10">
                                <i class="fas fa-rocket mr-2"></i> Comenzar test gratis
                            </span>
                        </a>
                        <a href="#riasec" class="btn-ghost px-8 py-4 rounded-2xl font-semibold text-white text-center flex items-center justify-center gap-2">
                            <i class="fas fa-compass text-valle-400"></i> Conocer RIASEC
                        </a>
                    </div>

                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-x-8 gap-y-3 text-sm">
                        <div class="flex items-center gap-2 text-gray-300">
                            <i class="fas fa-shield-halved text-valle-400"></i>
                            <span>100% confidencial</span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-300">
                            <i class="fas fa-bolt text-tec-400"></i>
                            <span>Rápido y sencillo</span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-300">
                            <i class="fas fa-certificate text-valle-400"></i>
                            <span>Basado en teoría de Holland</span>
                        </div>
                    </div>
                </div>

                <!-- Imagen / Card 3D -->
                <div class="flex justify-center lg:justify-end animate-fade-in-up animation-delay-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-tec-500 to-valle-500 rounded-3xl blur-3xl opacity-30 scale-90"></div>

                        <div class="hero-image relative bg-gradient-to-br from-tec-700 via-tec-600 to-valle-600 rounded-3xl p-8 w-80 h-80 md:w-96 md:h-96 flex items-center justify-center overflow-hidden border border-white/10">
                            <div class="text-center relative z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300" class="w-52 h-40 md:w-64 md:h-48 mx-auto mb-4">
                                    <defs>
                                        <linearGradient id="mountainGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                            <stop offset="0%" style="stop-color:#4dbe4d;stop-opacity:0.9" />
                                            <stop offset="100%" style="stop-color:#0080ff;stop-opacity:0.7" />
                                        </linearGradient>
                                        <linearGradient id="sunGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#ffffff;stop-opacity:1" />
                                            <stop offset="100%" style="stop-color:#b3e0ff;stop-opacity:0.8" />
                                        </linearGradient>
                                    </defs>

                                    <path d="M50 200 L120 120 L190 200 Z" fill="url(#mountainGrad)" opacity="0.9"/>
                                    <path d="M150 200 L220 100 L290 200 Z" fill="url(#mountainGrad)" opacity="0.7"/>
                                    <path d="M250 200 L320 80 L390 200 Z" fill="url(#mountainGrad)" opacity="0.8"/>

                                    <path d="M200 250 Q250 180 300 150" stroke="#ffffff" stroke-width="8" stroke-linecap="round" fill="none" opacity="0.7"/>
                                    <path d="M200 250 Q250 180 300 150" stroke="#4dbe4d" stroke-width="4" stroke-linecap="round" fill="none" opacity="0.9"/>

                                    <circle cx="250" cy="190" r="12" fill="#ffffff" opacity="0.95"/>
                                    <path d="M250 202 L250 220" stroke="#ffffff" stroke-width="4" stroke-linecap="round" opacity="0.95"/>
                                    <path d="M250 210 L240 200" stroke="#ffffff" stroke-width="3" stroke-linecap="round" opacity="0.95"/>
                                    <path d="M250 210 L260 200" stroke="#ffffff" stroke-width="3" stroke-linecap="round" opacity="0.95"/>
                                    <path d="M250 220 L240 240" stroke="#ffffff" stroke-width="3" stroke-linecap="round" opacity="0.95"/>
                                    <path d="M250 220 L260 240" stroke="#ffffff" stroke-width="3" stroke-linecap="round" opacity="0.95"/>

                                    <circle cx="100" cy="80" r="3" fill="#ffffff" opacity="0.9"/>
                                    <circle cx="180" cy="60" r="2" fill="#ffffff" opacity="0.7"/>
                                    <circle cx="280" cy="40" r="3" fill="#ffffff" opacity="0.9"/>
                                    <circle cx="350" cy="70" r="2" fill="#ffffff" opacity="0.6"/>

                                    <circle cx="320" cy="50" r="16" fill="url(#sunGrad)" opacity="0.95"/>
                                    <g opacity="0.7">
                                        <line x1="320" y1="28" x2="320" y2="18" stroke="#ffffff" stroke-width="3" stroke-linecap="round"/>
                                        <line x1="320" y1="72" x2="320" y2="82" stroke="#ffffff" stroke-width="3" stroke-linecap="round"/>
                                        <line x1="298" y1="50" x2="288" y2="50" stroke="#ffffff" stroke-width="3" stroke-linecap="round"/>
                                        <line x1="342" y1="50" x2="352" y2="50" stroke="#ffffff" stroke-width="3" stroke-linecap="round"/>
                                        <line x1="303" y1="33" x2="296" y2="26" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                                        <line x1="337" y1="33" x2="344" y2="26" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                                        <line x1="303" y1="67" x2="296" y2="74" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                                        <line x1="337" y1="67" x2="344" y2="74" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                                    </g>
                                </svg>
                                <h3 class="text-2xl font-bold font-display mb-1">Tu Camino Profesional</h3>
                                <p class="text-tec-100 text-sm">Asciende hacia tu éxito</p>
                            </div>

                            <div class="absolute -top-16 -right-16 w-48 h-48 bg-white rounded-full opacity-5"></div>
                            <div class="absolute -bottom-12 -left-12 w-40 h-40 bg-white rounded-full opacity-10"></div>
                        </div>

                        <!-- Badge flotante: RIASEC -->
                        <div class="absolute -top-4 -right-4 glass-strong rounded-2xl p-3 shadow-2xl animate-float badge-glow">
                            <div class="flex items-center gap-2">
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-valle-500 to-valle-600 flex items-center justify-center">
                                    <i class="fas fa-compass text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-400 uppercase tracking-wider">Modelo</p>
                                    <p class="text-sm font-bold">RIASEC</p>
                                </div>
                            </div>
                        </div>

                        <!-- Badge flotante: 6 perfiles -->
                        <div class="absolute -bottom-4 -left-4 glass-strong rounded-2xl p-3 shadow-2xl animate-float animation-delay-1000 badge-glow">
                            <div class="flex items-center gap-2">
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-tec-500 to-tec-600 flex items-center justify-center">
                                    <i class="fas fa-shapes text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-400 uppercase tracking-wider">Perfiles</p>
                                    <p class="text-sm font-bold">6 tipos</p>
                                </div>
                            </div>
                        </div>

                        <div class="absolute top-1/2 -right-8 w-3 h-3 bg-valle-400 rounded-full animate-pulse"></div>
                        <div class="absolute top-1/4 -left-6 w-2 h-2 bg-tec-400 rounded-full animate-pulse"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================
         ¿PARA QUIÉN ES?
         ============================================ -->
    <section class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-3xl mx-auto text-center mb-16 scroll-animate">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full glass-effect mb-4 text-xs font-medium text-tec-300">
                <i class="fas fa-user-graduate"></i> Hecho para ti
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold font-display mb-4 tracking-tight">
                ¿Esta plataforma es <span class="text-gradient">para mí</span>?
            </h2>
            <p class="text-lg text-gray-400 leading-relaxed">
                Si te identificas con alguna de estas situaciones, Inspiratec es para ti.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
            <div class="glass-effect rounded-2xl p-6 scroll-animate benefit-card">
                <div class="w-12 h-12 rounded-xl bg-tec-500/15 border border-tec-500/30 flex items-center justify-center mb-4">
                    <i class="fas fa-question text-tec-400"></i>
                </div>
                <p class="text-gray-200 leading-relaxed">
                    <span class="font-semibold text-white">No sabes qué estudiar</span> después de terminar el bachillerato.
                </p>
            </div>

            <div class="glass-effect rounded-2xl p-6 scroll-animate benefit-card">
                <div class="w-12 h-12 rounded-xl bg-valle-500/15 border border-valle-500/30 flex items-center justify-center mb-4">
                    <i class="fas fa-scale-balanced text-valle-400"></i>
                </div>
                <p class="text-gray-200 leading-relaxed">
                    Estás <span class="font-semibold text-white">entre dos o más carreras</span> y no sabes cuál elegir.
                </p>
            </div>

            <div class="glass-effect rounded-2xl p-6 scroll-animate benefit-card">
                <div class="w-12 h-12 rounded-xl bg-tec-500/15 border border-tec-500/30 flex items-center justify-center mb-4">
                    <i class="fas fa-heart text-tec-400"></i>
                </div>
                <p class="text-gray-200 leading-relaxed">
                    Quieres <span class="font-semibold text-white">estudiar algo que te apasione</span> y no solo lo que dicen los demás.
                </p>
            </div>

            <div class="glass-effect rounded-2xl p-6 scroll-animate benefit-card">
                <div class="w-12 h-12 rounded-xl bg-valle-500/15 border border-valle-500/30 flex items-center justify-center mb-4">
                    <i class="fas fa-users text-valle-400"></i>
                </div>
                <p class="text-gray-200 leading-relaxed">
                    Quieres tomar una decisión <span class="font-semibold text-white">informada y con fundamento</span>, no al azar.
                </p>
            </div>

            <div class="glass-effect rounded-2xl p-6 scroll-animate benefit-card">
                <div class="w-12 h-12 rounded-xl bg-tec-500/15 border border-tec-500/30 flex items-center justify-center mb-4">
                    <i class="fas fa-lightbulb text-tec-400"></i>
                </div>
                <p class="text-gray-200 leading-relaxed">
                    Necesitas <span class="font-semibold text-white">conocerte mejor</span> para entender qué se te da bien.
                </p>
            </div>

            <div class="glass-effect rounded-2xl p-6 scroll-animate benefit-card">
                <div class="w-12 h-12 rounded-xl bg-valle-500/15 border border-valle-500/30 flex items-center justify-center mb-4">
                    <i class="fas fa-map-signs text-valle-400"></i>
                </div>
                <p class="text-gray-200 leading-relaxed">
                    Buscas una <span class="font-semibold text-white">guía clara</span> sobre las carreras y áreas profesionales.
                </p>
            </div>
        </div>
    </section>

    <!-- ============================================
         BENEFICIOS
         ============================================ -->
    <section id="beneficios" class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-3xl mx-auto text-center mb-16 scroll-animate">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full glass-effect mb-4 text-xs font-medium text-tec-300">
                <i class="fas fa-sparkles"></i> Beneficios
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold font-display mb-4 tracking-tight">
                Lo que obtienes con <span class="text-gradient">Inspiratec</span>
            </h2>
            <p class="text-lg text-gray-400 leading-relaxed">
                Herramientas diseñadas para que tomes la mejor decisión sobre tu futuro profesional.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            <div class="benefit-card glass-effect rounded-3xl p-8 scroll-animate">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-tec-500 to-tec-700 flex items-center justify-center mb-6 shadow-lg shadow-tec-500/30">
                    <i class="fas fa-brain text-xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold font-display mb-3">Conoce tu perfil</h3>
                <p class="text-gray-400 leading-relaxed text-sm">
                    El test RIASEC te ayuda a identificar tus intereses y habilidades según la teoría de John Holland, usada en orientación vocacional a nivel mundial.
                </p>
                <div class="mt-6 pt-6 border-t border-white/5 flex items-center text-tec-300 text-sm font-medium">
                    Basado en evidencia <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </div>
            </div>

            <div class="benefit-card glass-effect rounded-3xl p-8 scroll-animate relative overflow-hidden" style="background: linear-gradient(135deg, rgba(0,128,255,0.08), rgba(77,190,77,0.08));">
                <div class="absolute -top-8 -right-8 w-32 h-32 bg-valle-500 rounded-full blur-3xl opacity-30"></div>
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-valle-500 to-valle-700 flex items-center justify-center mb-6 shadow-lg shadow-valle-500/30 relative z-10">
                    <i class="fas fa-list-check text-xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold font-display mb-3 relative z-10">Carreras recomendadas</h3>
                <p class="text-gray-300 leading-relaxed text-sm relative z-10">
                    Con base en tu perfil, te mostramos las áreas profesionales y carreras que más se alinean con tus intereses.
                </p>
                <div class="mt-6 pt-6 border-t border-white/10 flex items-center text-valle-300 text-sm font-medium relative z-10">
                    Informe personalizado <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </div>
            </div>

            <div class="benefit-card glass-effect rounded-3xl p-8 scroll-animate">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-tec-500 to-valle-600 flex items-center justify-center mb-6 shadow-lg shadow-tec-500/30">
                    <i class="fas fa-lock text-xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold font-display mb-3">Privacidad total</h3>
                <p class="text-gray-400 leading-relaxed text-sm">
                    Tus respuestas y resultados son confidenciales. Solo tú puedes verlos desde tu cuenta personal.
                </p>
                <div class="mt-6 pt-6 border-t border-white/5 flex items-center text-tec-300 text-sm font-medium">
                    Tus datos protegidos <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         RIASEC MODEL
         ============================================ -->
    <section id="riasec" class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-3xl mx-auto text-center mb-16 scroll-animate">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full glass-effect mb-4 text-xs font-medium text-valle-300">
                <i class="fas fa-compass"></i> Teoría de Holland
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold font-display mb-4 tracking-tight">
                Los 6 perfiles del modelo <span class="text-gradient">RIASEC</span>
            </h2>
            <p class="text-lg text-gray-400 leading-relaxed">
                Cada persona tiene una combinación de estos 6 tipos. Descubre el tuyo y las carreras afines.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Realista -->
            <div class="flip-card scroll-animate" data-type="R">
                <div class="flip-card-inner">
                    <div class="flip-card-front glass-effect p-7 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-5">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-red-500/30 to-red-500/10 flex items-center justify-center border border-red-500/30">
                                    <i class="fas fa-tools text-2xl text-red-400"></i>
                                </div>
                                <span class="text-5xl font-extrabold font-display text-red-500/20">R</span>
                            </div>
                            <h3 class="text-xl font-bold font-display mb-2 text-red-400">Realista</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">
                                Prácticos, mecánicos, disfrutan trabajar con herramientas, máquinas o al aire libre.
                            </p>
                        </div>
                        <div class="flex items-center text-xs text-gray-500 mt-5 pt-5 border-t border-white/5">
                            <i class="fas fa-hand-pointer mr-2"></i> Clic para ver áreas afines
                        </div>
                    </div>
                    <div class="flip-card-back bg-gradient-to-br from-red-900 to-red-950 p-7 flex flex-col justify-center border border-red-500/30">
                        <h3 class="text-lg font-bold font-display mb-4 text-white text-center">Áreas afines</h3>
                        <ul class="text-white/90 space-y-2.5 text-sm">
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-red-400 mr-3"></i> Ingenierías</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-red-400 mr-3"></i> Arquitectura</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-red-400 mr-3"></i> Mecánica y electrónica</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-red-400 mr-3"></i> Agropecuaria</li>
                        </ul>
                        <button class="flip-back mt-6 px-4 py-2 bg-red-600/80 hover:bg-red-600 rounded-xl text-white text-xs font-medium transition-colors duration-300">
                            <i class="fas fa-undo mr-1"></i> Volver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Investigador -->
            <div class="flip-card scroll-animate" data-type="I">
                <div class="flip-card-inner">
                    <div class="flip-card-front glass-effect p-7 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-5">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500/30 to-blue-500/10 flex items-center justify-center border border-blue-500/30">
                                    <i class="fas fa-microscope text-2xl text-blue-400"></i>
                                </div>
                                <span class="text-5xl font-extrabold font-display text-blue-500/20">I</span>
                            </div>
                            <h3 class="text-xl font-bold font-display mb-2 text-blue-400">Investigador</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">
                                Analíticos, intelectuales y curiosos. Disfrutan observar, analizar y resolver problemas.
                            </p>
                        </div>
                        <div class="flex items-center text-xs text-gray-500 mt-5 pt-5 border-t border-white/5">
                            <i class="fas fa-hand-pointer mr-2"></i> Clic para ver áreas afines
                        </div>
                    </div>
                    <div class="flip-card-back bg-gradient-to-br from-blue-900 to-blue-950 p-7 flex flex-col justify-center border border-blue-500/30">
                        <h3 class="text-lg font-bold font-display mb-4 text-white text-center">Áreas afines</h3>
                        <ul class="text-white/90 space-y-2.5 text-sm">
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-blue-400 mr-3"></i> Ciencias exactas</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-blue-400 mr-3"></i> Medicina y salud</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-blue-400 mr-3"></i> Investigación</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-blue-400 mr-3"></i> Matemáticas</li>
                        </ul>
                        <button class="flip-back mt-6 px-4 py-2 bg-blue-600/80 hover:bg-blue-600 rounded-xl text-white text-xs font-medium transition-colors duration-300">
                            <i class="fas fa-undo mr-1"></i> Volver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Artístico -->
            <div class="flip-card scroll-animate" data-type="A">
                <div class="flip-card-inner">
                    <div class="flip-card-front glass-effect p-7 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-5">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-purple-500/30 to-purple-500/10 flex items-center justify-center border border-purple-500/30">
                                    <i class="fas fa-palette text-2xl text-purple-400"></i>
                                </div>
                                <span class="text-5xl font-extrabold font-display text-purple-500/20">A</span>
                            </div>
                            <h3 class="text-xl font-bold font-display mb-2 text-purple-400">Artístico</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">
                                Creativos, originales e independientes. Se expresan a través del arte y la innovación.
                            </p>
                        </div>
                        <div class="flex items-center text-xs text-gray-500 mt-5 pt-5 border-t border-white/5">
                            <i class="fas fa-hand-pointer mr-2"></i> Clic para ver áreas afines
                        </div>
                    </div>
                    <div class="flip-card-back bg-gradient-to-br from-purple-900 to-purple-950 p-7 flex flex-col justify-center border border-purple-500/30">
                        <h3 class="text-lg font-bold font-display mb-4 text-white text-center">Áreas afines</h3>
                        <ul class="text-white/90 space-y-2.5 text-sm">
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-purple-400 mr-3"></i> Diseño gráfico</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-purple-400 mr-3"></i> Artes visuales</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-purple-400 mr-3"></i> Música y danza</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-purple-400 mr-3"></i> Comunicación</li>
                        </ul>
                        <button class="flip-back mt-6 px-4 py-2 bg-purple-600/80 hover:bg-purple-600 rounded-xl text-white text-xs font-medium transition-colors duration-300">
                            <i class="fas fa-undo mr-1"></i> Volver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Social -->
            <div class="flip-card scroll-animate" data-type="S">
                <div class="flip-card-inner">
                    <div class="flip-card-front glass-effect p-7 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-5">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-green-500/30 to-green-500/10 flex items-center justify-center border border-green-500/30">
                                    <i class="fas fa-users text-2xl text-green-400"></i>
                                </div>
                                <span class="text-5xl font-extrabold font-display text-green-500/20">S</span>
                            </div>
                            <h3 class="text-xl font-bold font-display mb-2 text-green-400">Social</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">
                                Cooperativos, empáticos y serviciales. Disfrutan ayudar, enseñar y escuchar a otros.
                            </p>
                        </div>
                        <div class="flex items-center text-xs text-gray-500 mt-5 pt-5 border-t border-white/5">
                            <i class="fas fa-hand-pointer mr-2"></i> Clic para ver áreas afines
                        </div>
                    </div>
                    <div class="flip-card-back bg-gradient-to-br from-green-900 to-green-950 p-7 flex flex-col justify-center border border-green-500/30">
                        <h3 class="text-lg font-bold font-display mb-4 text-white text-center">Áreas afines</h3>
                        <ul class="text-white/90 space-y-2.5 text-sm">
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-green-400 mr-3"></i> Educación</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-green-400 mr-3"></i> Psicología</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-green-400 mr-3"></i> Trabajo social</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-green-400 mr-3"></i> Enfermería</li>
                        </ul>
                        <button class="flip-back mt-6 px-4 py-2 bg-green-600/80 hover:bg-green-600 rounded-xl text-white text-xs font-medium transition-colors duration-300">
                            <i class="fas fa-undo mr-1"></i> Volver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Emprendedor -->
            <div class="flip-card scroll-animate" data-type="E">
                <div class="flip-card-inner">
                    <div class="flip-card-front glass-effect p-7 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-5">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-yellow-500/30 to-yellow-500/10 flex items-center justify-center border border-yellow-500/30">
                                    <i class="fas fa-briefcase text-2xl text-yellow-400"></i>
                                </div>
                                <span class="text-5xl font-extrabold font-display text-yellow-500/20">E</span>
                            </div>
                            <h3 class="text-xl font-bold font-display mb-2 text-yellow-400">Emprendedor</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">
                                Energéticos, ambiciosos y persuasivos. Disfrutan liderar, influir y tomar decisiones.
                            </p>
                        </div>
                        <div class="flex items-center text-xs text-gray-500 mt-5 pt-5 border-t border-white/5">
                            <i class="fas fa-hand-pointer mr-2"></i> Clic para ver áreas afines
                        </div>
                    </div>
                    <div class="flip-card-back bg-gradient-to-br from-yellow-900 to-yellow-950 p-7 flex flex-col justify-center border border-yellow-500/30">
                        <h3 class="text-lg font-bold font-display mb-4 text-white text-center">Áreas afines</h3>
                        <ul class="text-white/90 space-y-2.5 text-sm">
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-yellow-400 mr-3"></i> Administración</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-yellow-400 mr-3"></i> Negocios</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-yellow-400 mr-3"></i> Derecho</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-yellow-400 mr-3"></i> Mercadotecnia</li>
                        </ul>
                        <button class="flip-back mt-6 px-4 py-2 bg-yellow-600/80 hover:bg-yellow-600 rounded-xl text-white text-xs font-medium transition-colors duration-300">
                            <i class="fas fa-undo mr-1"></i> Volver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Convencional -->
            <div class="flip-card scroll-animate" data-type="C">
                <div class="flip-card-inner">
                    <div class="flip-card-front glass-effect p-7 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-5">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-500/30 to-indigo-500/10 flex items-center justify-center border border-indigo-500/30">
                                    <i class="fas fa-chart-bar text-2xl text-indigo-400"></i>
                                </div>
                                <span class="text-5xl font-extrabold font-display text-indigo-500/20">C</span>
                            </div>
                            <h3 class="text-xl font-bold font-display mb-2 text-indigo-400">Convencional</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">
                                Organizados, detallistas y metódicos. Disfrutan trabajar con datos y procedimientos claros.
                            </p>
                        </div>
                        <div class="flex items-center text-xs text-gray-500 mt-5 pt-5 border-t border-white/5">
                            <i class="fas fa-hand-pointer mr-2"></i> Clic para ver áreas afines
                        </div>
                    </div>
                    <div class="flip-card-back bg-gradient-to-br from-indigo-900 to-indigo-950 p-7 flex flex-col justify-center border border-indigo-500/30">
                        <h3 class="text-lg font-bold font-display mb-4 text-white text-center">Áreas afines</h3>
                        <ul class="text-white/90 space-y-2.5 text-sm">
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-indigo-400 mr-3"></i> Contabilidad</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-indigo-400 mr-3"></i> Finanzas</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-indigo-400 mr-3"></i> Administración</li>
                            <li class="flex items-center"><i class="fas fa-circle text-[6px] text-indigo-400 mr-3"></i> Logística</li>
                        </ul>
                        <button class="flip-back mt-6 px-4 py-2 bg-indigo-600/80 hover:bg-indigo-600 rounded-xl text-white text-xs font-medium transition-colors duration-300">
                            <i class="fas fa-undo mr-1"></i> Volver
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         CÓMO FUNCIONA
         ============================================ -->
    <section id="como-funciona" class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-3xl mx-auto text-center mb-16 scroll-animate">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full glass-effect mb-4 text-xs font-medium text-tec-300">
                <i class="fas fa-list-ol"></i> Proceso
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold font-display mb-4 tracking-tight">
                Solo <span class="text-gradient">3 pasos</span> para empezar
            </h2>
            <p class="text-lg text-gray-400 leading-relaxed">
                Sin complicaciones. De principio a fin en pocos minutos.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative">
            <div class="hidden md:block absolute top-16 left-[16%] right-[16%] h-0.5 bg-gradient-to-r from-tec-500/0 via-tec-500/50 to-valle-500/0"></div>

            <div class="scroll-animate text-center relative">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-tec-500 to-tec-700 flex items-center justify-center mx-auto mb-5 shadow-xl shadow-tec-500/30 relative z-10">
                    <span class="text-2xl font-bold font-display">1</span>
                </div>
                <h3 class="text-lg font-bold font-display mb-2">Crea tu cuenta</h3>
                <p class="text-sm text-gray-400 leading-relaxed max-w-xs mx-auto">
                    Regístrate con tu correo. Solo te tomará un minuto.
                </p>
            </div>

            <div class="scroll-animate text-center relative" style="transition-delay: 100ms;">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-valle-500 to-valle-700 flex items-center justify-center mx-auto mb-5 shadow-xl shadow-valle-500/30 relative z-10">
                    <span class="text-2xl font-bold font-display">2</span>
                </div>
                <h3 class="text-lg font-bold font-display mb-2">Contesta el test</h3>
                <p class="text-sm text-gray-400 leading-relaxed max-w-xs mx-auto">
                    Responde con calma y sinceridad. No hay respuestas correctas ni incorrectas.
                </p>
            </div>

            <div class="scroll-animate text-center relative" style="transition-delay: 200ms;">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-tec-500 to-valle-600 flex items-center justify-center mx-auto mb-5 shadow-xl shadow-tec-500/30 relative z-10">
                    <span class="text-2xl font-bold font-display">3</span>
                </div>
                <h3 class="text-lg font-bold font-display mb-2">Conoce tu resultado</h3>
                <p class="text-sm text-gray-400 leading-relaxed max-w-xs mx-auto">
                    Recibe tu perfil RIASEC y las áreas profesionales afines a ti.
                </p>
            </div>
        </div>
    </section>

    <!-- ============================================
         TESTIMONIO / CITA DESTACADA
         ============================================ -->
    <section class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-4xl mx-auto scroll-animate">
            <div class="relative glass-effect rounded-3xl p-8 md:p-14 overflow-hidden">
                <div class="absolute top-6 left-8 text-8xl text-white/5 font-serif leading-none select-none">"</div>
                <div class="relative z-10 text-center">
                    <i class="fas fa-compass text-4xl text-gradient-static mb-6"></i>
                    <p class="text-xl md:text-2xl text-gray-200 leading-relaxed font-display italic mb-6 max-w-3xl mx-auto">
                        Elegir una carrera no se trata solo de lo que vas a estudiar, sino de quién quieres llegar a ser.
                        Conocerte primero es el mejor punto de partida.
                    </p>
                
        </div>
    </section>

    <!-- ============================================
         FAQ
         ============================================ -->
    <section id="faq" class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-3xl mx-auto text-center mb-16 scroll-animate">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full glass-effect mb-4 text-xs font-medium text-valle-300">
                <i class="fas fa-circle-question"></i> Preguntas frecuentes
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold font-display mb-4 tracking-tight">
                Resolvemos tus <span class="text-gradient">dudas</span>
            </h2>
            <p class="text-lg text-gray-400 leading-relaxed">
                Lo que suelen preguntarnos los estudiantes antes de comenzar.
            </p>
        </div>

        <div class="max-w-3xl mx-auto space-y-4">
            <div class="faq-item glass-effect rounded-2xl overflow-hidden scroll-animate">
                <button class="faq-trigger w-full flex items-center justify-between p-6 text-left">
                    <span class="font-semibold text-white pr-4">¿Cuánto tiempo toma hacer el test?</span>
                    <span class="faq-icon flex-shrink-0 w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-white transition-all duration-300">
                        <i class="fas fa-plus text-sm"></i>
                    </span>
                </button>
                <div class="faq-answer">
                    <p class="px-6 pb-6 text-gray-400 leading-relaxed">
                        El test está diseñado para completarse sin prisas. Puedes responderlo en una sola sesión o guardar tu progreso y continuar después desde tu cuenta.
                    </p>
                </div>
            </div>

            <div class="faq-item glass-effect rounded-2xl overflow-hidden scroll-animate">
                <button class="faq-trigger w-full flex items-center justify-between p-6 text-left">
                    <span class="font-semibold text-white pr-4">¿Necesito tener claro qué quiero estudiar?</span>
                    <span class="faq-icon flex-shrink-0 w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-white transition-all duration-300">
                        <i class="fas fa-plus text-sm"></i>
                    </span>
                </button>
                <div class="faq-answer">
                    <p class="px-6 pb-6 text-gray-400 leading-relaxed">
                        No. De hecho, la plataforma está pensada especialmente para quienes todavía no lo tienen claro. El test te ayuda a descubrir tus intereses y a ordenar tus opciones.
                    </p>
                </div>
            </div>

            <div class="faq-item glass-effect rounded-2xl overflow-hidden scroll-animate">
                <button class="faq-trigger w-full flex items-center justify-between p-6 text-left">
                    <span class="font-semibold text-white pr-4">¿El test tiene respuestas correctas o incorrectas?</span>
                    <span class="faq-icon flex-shrink-0 w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-white transition-all duration-300">
                        <i class="fas fa-plus text-sm"></i>
                    </span>
                </button>
                <div class="faq-answer">
                    <p class="px-6 pb-6 text-gray-400 leading-relaxed">
                        No. No hay respuestas buenas ni malas. Lo importante es que contestes con sinceridad para que el resultado refleje realmente tus intereses.
                    </p>
                </div>
            </div>

            <div class="faq-item glass-effect rounded-2xl overflow-hidden scroll-animate">
                <button class="faq-trigger w-full flex items-center justify-between p-6 text-left">
                    <span class="font-semibold text-white pr-4">¿Mi información es privada?</span>
                    <span class="faq-icon flex-shrink-0 w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-white transition-all duration-300">
                        <i class="fas fa-plus text-sm"></i>
                    </span>
                </button>
                <div class="faq-answer">
                    <p class="px-6 pb-6 text-gray-400 leading-relaxed">
                        Sí. Tus respuestas y resultados solo son visibles desde tu cuenta. No compartimos tu información con terceros.
                    </p>
                </div>
            </div>

            <div class="faq-item glass-effect rounded-2xl overflow-hidden scroll-animate">
                <button class="faq-trigger w-full flex items-center justify-between p-6 text-left">
                    <span class="font-semibold text-white pr-4">¿En qué se basa el modelo RIASEC?</span>
                    <span class="faq-icon flex-shrink-0 w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-white transition-all duration-300">
                        <i class="fas fa-plus text-sm"></i>
                    </span>
                </button>
                <div class="faq-answer">
                    <p class="px-6 pb-6 text-gray-400 leading-relaxed">
                        En la teoría del psicólogo John Holland, que clasifica los intereses profesionales en 6 tipos: Realista, Investigador, Artístico, Social, Emprendedor y Convencional. Es uno de los modelos más usados en orientación vocacional a nivel internacional.
                    </p>
                </div>
            </div>

            <div class="faq-item glass-effect rounded-2xl overflow-hidden scroll-animate">
                <button class="faq-trigger w-full flex items-center justify-between p-6 text-left">
                    <span class="font-semibold text-white pr-4">¿El resultado me dice exactamente qué estudiar?</span>
                    <span class="faq-icon flex-shrink-0 w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-white transition-all duration-300">
                        <i class="fas fa-plus text-sm"></i>
                    </span>
                </button>
                <div class="faq-answer">
                    <p class="px-6 pb-6 text-gray-400 leading-relaxed">
                        El resultado te muestra tus intereses predominantes y las áreas profesionales afines a ellos. Es una guía que te ayuda a decidir con información, no una imposición. La decisión final siempre es tuya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         CTA SECTION
         ============================================ -->
    <section id="test" class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-5xl mx-auto scroll-animate">
            <div class="relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-tec-500 to-valle-500 rounded-[2rem] blur-2xl opacity-20"></div>

                <div class="relative glass-effect rounded-[2rem] p-8 md:p-16 overflow-hidden border border-white/10">
                    <div class="absolute top-0 right-0 w-72 h-72 bg-tec-500 rounded-full blur-3xl opacity-10"></div>
                    <div class="absolute bottom-0 left-0 w-72 h-72 bg-valle-500 rounded-full blur-3xl opacity-10"></div>

                    <div class="relative z-10 text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-gradient-to-br from-tec-500 to-valle-500 mb-8 shadow-2xl shadow-tec-500/40">
                            <i class="fas fa-rocket text-3xl text-white"></i>
                        </div>

                        <h2 class="text-3xl md:text-5xl lg:text-6xl font-extrabold font-display mb-6 tracking-tight leading-tight">
                            ¿Listo para dar el <span class="text-gradient">siguiente paso</span>?
                        </h2>

                        <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto mb-10 leading-relaxed">
                            Conoce tu perfil vocacional y descubre las áreas profesionales que mejor van contigo. Sin costo, sin complicaciones.
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-3xl mx-auto mb-10">
                            <div class="glass-effect rounded-2xl p-5 flex items-center gap-3">
                                <i class="fas fa-brain text-tec-400 text-xl"></i>
                                <div class="text-left">
                                    <p class="text-sm font-semibold">Test RIASEC</p>
                                    <p class="text-xs text-gray-400">Teoría de Holland</p>
                                </div>
                            </div>
                            <div class="glass-effect rounded-2xl p-5 flex items-center gap-3">
                                <i class="fas fa-chart-pie text-valle-400 text-xl"></i>
                                <div class="text-left">
                                    <p class="text-sm font-semibold">Tu perfil</p>
                                    <p class="text-xs text-gray-400">Personalizado</p>
                                </div>
                            </div>
                            <div class="glass-effect rounded-2xl p-5 flex items-center gap-3">
                                <i class="fas fa-road text-tec-400 text-xl"></i>
                                <div class="text-left">
                                    <p class="text-sm font-semibold">Áreas afines</p>
                                    <p class="text-xs text-gray-400">Para explorar</p>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('register') }}" class="cta-shine inline-flex items-center gap-3 px-10 py-5 rounded-2xl font-bold text-white text-lg shadow-2xl shadow-tec-500/40 hover:scale-105 transition-transform duration-300">
                            <i class="fas fa-play"></i>
                            Comenzar ahora
                            <i class="fas fa-arrow-right"></i>
                        </a>

                        <div class="flex flex-wrap justify-center items-center gap-x-8 gap-y-3 text-sm text-gray-400 mt-10">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-shield-halved text-valle-400"></i>
                                <span>Resultados confidenciales</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-clock text-tec-400"></i>
                                <span>Rápido y sencillo</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-gift text-valle-400"></i>
                                <span>Completamente gratis</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         FOOTER
         ============================================ -->
    <footer class="relative z-10 mt-20 border-t border-white/5">
        <div class="container mx-auto px-4 py-14">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-10">

                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-5">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center shadow-lg shadow-tec-500/30">
                            <i class="fas fa-graduation-cap text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold font-display">Inspiratec</h3>
                            <p class="text-xs text-tec-300 uppercase tracking-widest">TESVB · Valle de Bravo</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed max-w-md">
                        Plataforma de orientación vocacional dirigida a estudiantes de nivel medio superior que están por elegir una carrera profesional. Impulsada por el Tecnológico de Estudios Superiores de Valle de Bravo.
                    </p>
                </div>

                <div>
                    <h4 class="text-sm font-bold font-display uppercase tracking-wider text-white mb-4">Plataforma</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#beneficios" class="text-gray-400 hover:text-tec-300 transition-colors">Beneficios</a></li>
                        <li><a href="#riasec" class="text-gray-400 hover:text-tec-300 transition-colors">Modelo RIASEC</a></li>
                        <li><a href="#como-funciona" class="text-gray-400 hover:text-tec-300 transition-colors">Cómo funciona</a></li>
                        <li><a href="#faq" class="text-gray-400 hover:text-tec-300 transition-colors">Preguntas frecuentes</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-bold font-display uppercase tracking-wider text-white mb-4">Acceso</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-tec-300 transition-colors">Iniciar Sesión</a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-tec-300 transition-colors">Registrarse</a></li>
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-tec-300 transition-colors">Mi cuenta</a></li>
                    </ul>
                </div>

            </div>

            <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-500 text-center md:text-left">
                    © {{ date('Y') }} Tecnológico de Estudios Superiores de Valle de Bravo. Todos los derechos reservados.
                </p>
                <p class="text-xs text-gray-600">
                    Hecho con <i class="fas fa-heart text-red-400 mx-1"></i> para los estudiantes de todas las prepartorias del Estado de México.
                </p>
            </div>
        </div>
    </footer>

    <!-- ============================================
         SCROLL TO TOP
         ============================================ -->
    <button id="scrollTop" class="scroll-top fixed bottom-6 right-6 w-12 h-12 rounded-2xl bg-gradient-to-br from-tec-500 to-valle-500 flex items-center justify-center text-white shadow-2xl shadow-tec-500/40 hover:scale-110 transition-transform duration-300 z-40" aria-label="Volver arriba">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- ============================================
         JAVASCRIPT
         ============================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            'use strict';

            /* ============================================
               PROGRESS BAR
               ============================================ */
            const progressBar = document.getElementById('progressBar');
            function updateProgress() {
                const scrollTop = window.scrollY;
                const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                const progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
                progressBar.style.width = progress + '%';
            }

            /* ============================================
               NAVBAR + SCROLL TOP
               ============================================ */
            const navbar = document.getElementById('navbar');
            const scrollTopBtn = document.getElementById('scrollTop');

            let ticking = false;
            function handleScroll() {
                const y = window.scrollY;
                if (y > 50) navbar.classList.add('scrolled');
                else navbar.classList.remove('scrolled');

                if (y > 400) scrollTopBtn.classList.add('visible');
                else scrollTopBtn.classList.remove('visible');

                updateProgress();
                ticking = false;
            }

            window.addEventListener('scroll', () => {
                if (!ticking) {
                    window.requestAnimationFrame(handleScroll);
                    ticking = true;
                }
            }, { passive: true });

            handleScroll();

            scrollTopBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            /* ============================================
               TYPEWRITER
               ============================================ */
            const typewriterElement = document.getElementById('typewriter');
            const phrases = ['tu vocación', 'tu carrera', 'tu futuro', 'tu camino'];
            let phraseIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            let typewriterTimeout;

            function typeWriter() {
                const current = phrases[phraseIndex];
                if (isDeleting) {
                    charIndex--;
                    typewriterElement.textContent = current.substring(0, charIndex);
                    if (charIndex === 0) {
                        isDeleting = false;
                        phraseIndex = (phraseIndex + 1) % phrases.length;
                        typewriterTimeout = setTimeout(typeWriter, 500);
                    } else {
                        typewriterTimeout = setTimeout(typeWriter, 40);
                    }
                } else {
                    charIndex++;
                    typewriterElement.textContent = current.substring(0, charIndex);
                    if (charIndex === current.length) {
                        isDeleting = true;
                        typewriterTimeout = setTimeout(typeWriter, 2200);
                    } else {
                        typewriterTimeout = setTimeout(typeWriter, 90);
                    }
                }
            }
            typeWriter();

            /* ============================================
               MOBILE MENU
               ============================================ */
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMobileMenu = document.getElementById('close-mobile-menu');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');

            function openMenu() {
                mobileMenu.classList.add('open');
                mobileMenuOverlay.classList.add('open');
                document.body.style.overflow = 'hidden';
            }
            function closeMenu() {
                mobileMenu.classList.remove('open');
                mobileMenuOverlay.classList.remove('open');
                document.body.style.overflow = '';
            }

            mobileMenuButton?.addEventListener('click', openMenu);
            closeMobileMenu?.addEventListener('click', closeMenu);
            mobileMenuOverlay?.addEventListener('click', closeMenu);

            mobileMenu?.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', closeMenu);
            });

            /* ============================================
               FLIP CARDS
               ============================================ */
            document.querySelectorAll('.flip-card').forEach(card => {
                card.addEventListener('click', function(e) {
                    if (e.target.closest('.flip-back')) return;
                    this.classList.toggle('flipped');
                });

                const flipBackBtn = card.querySelector('.flip-back');
                if (flipBackBtn) {
                    flipBackBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        card.classList.remove('flipped');
                    });
                }
            });

            /* ============================================
               FAQ ACCORDION
               ============================================ */
            document.querySelectorAll('.faq-item').forEach(item => {
                const trigger = item.querySelector('.faq-trigger');
                trigger?.addEventListener('click', () => {
                    const wasOpen = item.classList.contains('open');
                    // Cerrar todos
                    document.querySelectorAll('.faq-item').forEach(other => {
                        other.classList.remove('open');
                    });
                    // Abrir si no estaba abierto
                    if (!wasOpen) item.classList.add('open');
                });
            });

            /* ============================================
               SCROLL ANIMATIONS (IntersectionObserver)
               ============================================ */
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.12,
                rootMargin: '0px 0px -60px 0px'
            });

            document.querySelectorAll('.scroll-animate').forEach(el => observer.observe(el));

            /* ============================================
               PARTICLES
               ============================================ */
            const particlesContainer = document.getElementById('particles');
            if (particlesContainer && window.innerWidth > 768) {
                for (let i = 0; i < 30; i++) {
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
               CURSOR GLOW (desktop)
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
               SMOOTH SCROLL FOR ANCHOR LINKS
               ============================================ */
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href');
                    if (targetId === '#' || targetId === '#!') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        e.preventDefault();
                        const offsetTop = targetElement.getBoundingClientRect().top + window.scrollY - 80;
                        window.scrollTo({ top: offsetTop, behavior: 'smooth' });
                    }
                });
            });

            /* ============================================
               PARALLAX BLOBS
               ============================================ */
            if (window.innerWidth > 768) {
                const blobs = document.querySelectorAll('.blob');
                let blobTicking = false;

                window.addEventListener('scroll', () => {
                    if (!blobTicking) {
                        window.requestAnimationFrame(() => {
                            const scrolled = window.pageYOffset;
                            blobs.forEach((blob, i) => {
                                const speed = 0.05 + (i * 0.03);
                                blob.style.transform = `translateY(${scrolled * speed}px)`;
                            });
                            blobTicking = false;
                        });
                        blobTicking = true;
                    }
                }, { passive: true });
            }

        });
    </script>
</body>
</html>