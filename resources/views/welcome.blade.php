<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspiratec | TESVB Valle de Bravo</title>
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
                        'fade-in-down': 'fadeInDown 0.8s ease-out',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'slide-in-left': 'slideInLeft 0.8s ease-out',
                        'slide-in-right': 'slideInRight 0.8s ease-out',
                        'zoom-in': 'zoomIn 0.5s ease-out',
                        'typewriter': 'typewriter 4s steps(40) 1s 1 normal both',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeInDown: {
                            '0%': { opacity: '0', transform: 'translateY(-30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        slideInLeft: {
                            '0%': { opacity: '0', transform: 'translateX(-50px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                        slideInRight: {
                            '0%': { opacity: '0', transform: 'translateX(50px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                        zoomIn: {
                            '0%': { opacity: '0', transform: 'scale(0.9)' },
                            '100%': { opacity: '1', transform: 'scale(1)' },
                        },
                        typewriter: {
                            'from': { width: '0' },
                            'to': { width: '100%' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .flip-card {
            perspective: 1000px;
            cursor: pointer;
        }
        .flip-card.flipped .flip-card-inner {
            transform: rotateY(180deg);
        }
        .flip-card-inner {
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }
        .flip-card-front, .flip-card-back {
            backface-visibility: hidden;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .flip-card-back {
            transform: rotateY(180deg);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #001a33 0%, #003366 50%, #0080ff 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .scroll-animate {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }
        .scroll-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .typewriter {
            overflow: hidden;
            border-right: .15em solid #4dbe4d;
            white-space: nowrap;
            margin: 0 auto;
            animation: typewriter 4s steps(40) 1s 1 normal both;
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
        .shape-3 {
            width: 100px;
            height: 100px;
            background: #0080ff;
            top: 60%;
            left: 10%;
            animation: float 12s ease-in-out infinite;
        }
        .shape-4 {
            width: 120px;
            height: 120px;
            background: #4dbe4d;
            top: 30%;
            right: 15%;
            animation: float 9s ease-in-out infinite reverse;
        }
        .hero-image {
            transform: perspective(1000px) rotateY(-15deg) rotateX(10deg);
            transition: transform 0.5s ease;
            box-shadow: -20px 20px 30px rgba(0, 0, 0, 0.3);
        }
        .hero-image:hover {
            transform: perspective(1000px) rotateY(-5deg) rotateX(5deg);
        }
        .floating-card {
            animation: float 6s ease-in-out infinite;
        }
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }
        .mobile-menu.open {
            transform: translateX(0);
        }
        .menu-overlay {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }
        .menu-overlay.open {
            opacity: 1;
            visibility: visible;
        }

        .svg-graduation {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%230080ff'%3E%3Cpath d='M12 14l9-5-9-5-9 5 9 5z' /%3E%3Cpath d='M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z' /%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222' /%3E%3C/svg%3E");
        }

        .svg-career {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%234dbe4d'%3E%3Cpath d='M12 14l9-5-9-5-9 5 9 5z' /%3E%3Cpath d='M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z' /%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222' /%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="gradient-bg min-h-screen font-sans text-white overflow-x-hidden">
    <!-- Floating Shapes -->
    <div class="floating-shapes shape-1"></div>
    <div class="floating-shapes shape-2"></div>
    <div class="floating-shapes shape-3"></div>
    <div class="floating-shapes shape-4"></div>

    <!-- Header -->
    <header class="container mx-auto px-4 py-6 flex justify-between items-center relative z-10">
        <div class="flex items-center space-x-3 animate-fade-in-down">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center shadow-lg">
                <i class="fas fa-graduation-cap text-xl text-white"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold">Inspiratec</h1>
                <p class="text-xs text-tec-200">TESVB Valle de Bravo</p>
            </div>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center space-x-4">
            <a href="{{ route('login') }}" class="px-4 py-2 bg-tec-600 hover:bg-tec-700 rounded-lg transition-colors duration-300 font-medium">
                Iniciar Sesión
            </a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-valle-500 hover:bg-valle-600 rounded-lg transition-colors duration-300 font-medium">
                Registrarse
            </a>
        </div>

        <button id="mobile-menu-button" class="md:hidden text-white text-2xl">
            <i class="fas fa-bars"></i>
        </button>
    </header>

    <!-- Mobile Menu -->
    <div id="mobile-menu-overlay" class="menu-overlay fixed inset-0 bg-black bg-opacity-70 z-40"></div>
    <div id="mobile-menu" class="mobile-menu fixed top-0 left-0 h-full w-64 bg-tec-900 z-50 p-6">
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-white"></i>
                </div>
                <span class="font-bold">Inspiratec</span>
            </div>
            <button id="close-mobile-menu" class="text-white text-xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <nav class="space-y-6">
            <a href="#beneficios" class="block py-2 text-gray-300 hover:text-white transition-colors duration-300">
                <i class="fas fa-star mr-3"></i>Beneficios
            </a>
            <a href="#riasec" class="block py-2 text-gray-300 hover:text-white transition-colors duration-300">
                <i class="fas fa-info-circle mr-3"></i>Modelo RIASEC
            </a>
            <a href="#test" class="block py-2 text-gray-300 hover:text-white transition-colors duration-300">
                <i class="fas fa-rocket mr-3"></i>Realizar Test
            </a>

            <div class="pt-4 border-t border-tec-700">
                <a href="{{ route('login') }}" class="block w-full py-3 bg-tec-600 hover:bg-tec-700 rounded-lg text-center transition-colors duration-300 font-medium mb-3">
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}" class="block w-full py-3 bg-valle-500 hover:bg-valle-600 rounded-lg text-center transition-colors duration-300 font-medium">
                    Registrarse
                </a>
            </div>
        </nav>
    </div>

    <!-- Hero Section -->
    <section class="container mx-auto px-4 py-12 md:py-20 relative z-10">
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <div class="lg:w-1/2 text-center lg:text-left mb-12 lg:mb-0 animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6 leading-tight">
                    Descubre tu
                    <span class="bg-gradient-to-r from-tec-400 to-valle-400 bg-clip-text text-transparent typewriter">vocación</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-gray-200 max-w-2xl">
                    Plataforma de orientación vocacional del <span class="font-bold text-white">Tecnológico de Estudios Superiores de Valle de Bravo</span>.
                </p>

                <div class="flex flex-wrap justify-center lg:justify-start gap-4 mb-8">

                    <a href="#riasec" class="px-8 py-4 glass-effect hover:bg-white/10 font-semibold rounded-xl transition-all duration-300">
                        <i class="fas fa-info-circle mr-2"></i> Conocer RIASEC
                    </a>
                </div>

                <div class="flex items-center justify-center lg:justify-start space-x-6 text-sm text-gray-300">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-valle-400 mr-2"></i>
                        <span>Test validado científicamente</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-valle-400 mr-2"></i>
                        <span>Resultados personalizados</span>
                    </div>
                </div>
            </div>

           <div class="lg:w-1/2 flex justify-center animate-fade-in-up">
               <div class="relative">
                   <div class="hero-image floating-card bg-gradient-to-br from-tec-600 to-valle-600 rounded-2xl p-6 w-80 h-80 flex items-center justify-center overflow-hidden">
                       <!-- Imagen SVG inspiradora integrada directamente -->
                       <div class="text-center relative z-10">
                           <div class="mb-4 transform scale-110">
                               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300" class="w-48 h-36">
                                   <!-- Fondo abstracto -->
                                   <defs>
                                       <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                           <stop offset="0%" style="stop-color:#ffffff;stop-opacity:0.3" />
                                           <stop offset="100%" style="stop-color:#ffffff;stop-opacity:0.1" />
                                       </linearGradient>
                                       <linearGradient id="mountainGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                           <stop offset="0%" style="stop-color:#4dbe4d;stop-opacity:0.8" />
                                           <stop offset="100%" style="stop-color:#0080ff;stop-opacity:0.6" />
                                       </linearGradient>
                                   </defs>

                                   <!-- Montañas simbolizando crecimiento y logros -->
                                   <path d="M50 200 L120 120 L190 200 Z" fill="url(#mountainGrad)" opacity="0.9"/>
                                   <path d="M150 200 L220 100 L290 200 Z" fill="url(#mountainGrad)" opacity="0.7"/>
                                   <path d="M250 200 L320 80 L390 200 Z" fill="url(#mountainGrad)" opacity="0.8"/>

                                   <!-- Camino ascendente -->
                                   <path d="M200 250 Q250 180 300 150" stroke="#ffffff" stroke-width="8" stroke-linecap="round" fill="none" opacity="0.7"/>
                                   <path d="M200 250 Q250 180 300 150" stroke="#4dbe4d" stroke-width="4" stroke-linecap="round" fill="none" opacity="0.9"/>

                                   <!-- Persona en el camino -->
                                   <circle cx="250" cy="190" r="12" fill="#ffffff" opacity="0.9"/>
                                   <path d="M250 202 L250 220" stroke="#ffffff" stroke-width="4" stroke-linecap="round" opacity="0.9"/>
                                   <path d="M250 210 L240 200" stroke="#ffffff" stroke-width="3" stroke-linecap="round" opacity="0.9"/>
                                   <path d="M250 210 L260 200" stroke="#ffffff" stroke-width="3" stroke-linecap="round" opacity="0.9"/>
                                   <path d="M250 220 L240 240" stroke="#ffffff" stroke-width="3" stroke-linecap="round" opacity="0.9"/>
                                   <path d="M250 220 L260 240" stroke="#ffffff" stroke-width="3" stroke-linecap="round" opacity="0.9"/>

                                   <!-- Estrellas en el cielo simbolizando metas -->
                                   <circle cx="100" cy="80" r="3" fill="#ffffff" opacity="0.8"/>
                                   <circle cx="180" cy="60" r="2" fill="#ffffff" opacity="0.7"/>
                                   <circle cx="280" cy="40" r="3" fill="#ffffff" opacity="0.9"/>
                                   <circle cx="350" cy="70" r="2" fill="#ffffff" opacity="0.6"/>


                                   <circle cx="320" cy="50" r="15" fill="#ffffff" opacity="0.9"/>
                                   <g opacity="0.7">
                                       <line x1="320" y1="30" x2="320" y2="20" stroke="#ffffff" stroke-width="3"/>
                                       <line x1="320" y1="70" x2="320" y2="80" stroke="#ffffff" stroke-width="3"/>
                                       <line x1="300" y1="50" x2="290" y2="50" stroke="#ffffff" stroke-width="3"/>
                                       <line x1="340" y1="50" x2="350" y2="50" stroke="#ffffff" stroke-width="3"/>
                                       <line x1="305" y1="35" x2="298" y2="28" stroke="#ffffff" stroke-width="2"/>
                                       <line x1="335" y1="35" x2="342" y2="28" stroke="#ffffff" stroke-width="2"/>
                                       <line x1="305" y1="65" x2="298" y2="72" stroke="#ffffff" stroke-width="2"/>
                                       <line x1="335" y1="65" x2="342" y2="72" stroke="#ffffff" stroke-width="2"/>
                                   </g>
                               </svg>
                           </div>
                           <h3 class="text-xl font-bold text-red mb-2">Tu Camino Profesional</h3>
                           <p class="text-tec-100">Asciende hacia tu éxito</p>
                       </div>

                       <div class="absolute inset-0 overflow-hidden rounded-2xl">
                           <div class="absolute -top-10 -right-10 w-32 h-32 bg-white rounded-full opacity-5"></div>
                           <div class="absolute -bottom-8 -left-8 w-24 h-24 bg-white rounded-full opacity-10"></div>
                           <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-40 h-40 bg-gradient-to-r from-white to-transparent rounded-full opacity-3"></div>
                       </div>
                   </div>

                   <div class="absolute -top-4 -right-4 w-24 h-24 bg-valle-500 rounded-full opacity-20 animate-pulse-slow"></div>
                   <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-tec-500 rounded-full opacity-30 animate-pulse-slow"></div>
                   <div class="absolute top-1/2 -right-6 w-12 h-12 bg-white rounded-full opacity-10 animate-float animation-delay-1000"></div>
               </div>
           </div>
        </div>
    </section>


    <section id="beneficios" class="container mx-auto px-4 py-16 relative z-10">
        <div class="max-w-4xl mx-auto text-center mb-16 scroll-animate">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Beneficios de <span class="bg-gradient-to-r from-tec-400 to-valle-400 bg-clip-text text-transparent">Inspiratec</span></h2>
            <p class="text-xl text-gray-300 text-justify">
                Nuestra plataforma te ofrece herramientas avanzadas para tomar la mejor decisión sobre tu futuro profesional.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="glass-effect rounded-2xl p-6 text-center scroll-animate">
                <div class="w-20 h-20 rounded-full bg-gradient-to-r from-tec-500 to-tec-600 flex items-center justify-center mb-4 mx-auto shadow-lg">
                    <i class="fas fa-brain text-3xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Evaluación Integral</h3>
                <p class="text-gray-300 text-justify">
                    Test basado en el modelo RIASEC, validado por décadas de investigación en orientación vocacional.
                </p>
            </div>

            <div class="glass-effect rounded-2xl p-6 text-center scroll-animate">
                <div class="w-20 h-20 rounded-full bg-gradient-to-r from-valle-500 to-valle-600 flex items-center justify-center mb-4 mx-auto shadow-lg">
                    <i class="fas fa-chart-line text-3xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Resultados Detallados</h3>
                <p class="text-gray-300 text-justify">
                    Obtén un análisis completo de tu perfil con recomendaciones personalizadas de carreras y profesiones.
                </p>
            </div>

            <div class="glass-effect rounded-2xl p-6 text-center scroll-animate">
                <div class="w-20 h-20 rounded-full bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center mb-4 mx-auto shadow-lg">
                    <i class="fas fa-user-graduate text-3xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Seguimiento Continuo</h3>
                <p class="text-gray-300 text-justify">
                    Accede a tu perfil en cualquier momento y realiza seguimiento de tu desarrollo profesional.
                </p>
            </div>
        </div>
    </section>

    <!-- RIASEC Model Section -->
    <section id="riasec" class="container mx-auto px-4 py-16 relative z-10">
        <div class="max-w-4xl mx-auto text-center mb-16 scroll-animate">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Modelo <span class="bg-gradient-to-r from-tec-400 to-valle-400 bg-clip-text text-transparent">RIASEC</span></h2>
            <p class="text-xl text-gray-300 text-justify">
                Identifica tu tipo de personalidad profesional según la teoría de John Holland y descubre carreras afines a tus intereses.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Realista -->
            <div class="flip-card h-80 scroll-animate">
                <div class="flip-card-inner w-full h-full rounded-xl shadow-lg">
                    <div class="flip-card-front glass-effect rounded-xl p-6 flex flex-col justify-between">
                        <div>
                            <div class="w-16 h-16 rounded-lg bg-red-500/20 flex items-center justify-center mb-4">
                                <i class="fas fa-tools text-2xl text-red-400"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-red-400">Realista (R)</h3>
                            <p class="text-gray-300 text-justify">
                                Personas prácticas, mecánicas y que disfrutan trabajando con herramientas, máquinas o animales.
                            </p>
                        </div>
                        <div class="text-sm text-gray-400 mt-4">
                            <p>Haz clic para ver carreras relacionadas</p>
                        </div>
                    </div>
                    <div class="flip-card-back bg-gradient-to-br from-red-900/80 to-red-800/80 rounded-xl p-6 flex flex-col justify-center">
                        <h3 class="text-xl font-bold mb-4 text-white text-center">Carreras Realistas</h3>
                        <ul class="text-white/90 space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-red-300 mr-2"></i> Ingenierías
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-red-300 mr-2"></i> Arquitectura
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-red-300 mr-2"></i> Pilotaje
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-red-300 mr-2"></i> Agricultura
                            </li>
                        </ul>
                        <button class="mt-6 px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-white text-sm transition-colors duration-300 flip-back">
                            Volver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Investigador -->
            <div class="flip-card h-80 scroll-animate">
                <div class="flip-card-inner w-full h-full rounded-xl shadow-lg">
                    <div class="flip-card-front glass-effect rounded-xl p-6 flex flex-col justify-between">
                        <div>
                            <div class="w-16 h-16 rounded-lg bg-blue-500/20 flex items-center justify-center mb-4">
                                <i class="fas fa-microscope text-2xl text-blue-400"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-blue-400">Investigador (I)</h3>
                            <p class="text-gray-300 text-justify">
                                Personas analíticas, intelectuales y curiosas que disfrutan de la observación y el aprendizaje.
                            </p>
                        </div>
                        <div class="text-sm text-gray-400 mt-4">
                            <p>Haz clic para ver carreras relacionadas</p>
                        </div>
                    </div>
                    <div class="flip-card-back bg-gradient-to-br from-blue-900/80 to-blue-800/80 rounded-xl p-6 flex flex-col justify-center">
                        <h3 class="text-xl font-bold mb-4 text-white text-center">Carreras Investigadoras</h3>
                        <ul class="text-white/90 space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-blue-300 mr-2"></i> Ciencias
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-blue-300 mr-2"></i> Investigación
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-blue-300 mr-2"></i> Medicina
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-blue-300 mr-2"></i> Matemáticas
                            </li>
                        </ul>
                        <button class="mt-6 px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white text-sm transition-colors duration-300 flip-back">
                            Volver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Artístico -->
            <div class="flip-card h-80 scroll-animate">
                <div class="flip-card-inner w-full h-full rounded-xl shadow-lg">
                    <div class="flip-card-front glass-effect rounded-xl p-6 flex flex-col justify-between">
                        <div>
                            <div class="w-16 h-16 rounded-lg bg-purple-500/20 flex items-center justify-center mb-4">
                                <i class="fas fa-palette text-2xl text-purple-400"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-purple-400">Artístico (A)</h3>
                            <p class="text-gray-300 text-justify">
                                Personas creativas, originales e independientes que disfrutan expresándose a través del arte.
                            </p>
                        </div>
                        <div class="text-sm text-gray-400 mt-4">
                            <p>Haz clic para ver carreras relacionadas</p>
                        </div>
                    </div>
                    <div class="flip-card-back bg-gradient-to-br from-purple-900/80 to-purple-800/80 rounded-xl p-6 flex flex-col justify-center">
                        <h3 class="text-xl font-bold mb-4 text-white text-center">Carreras Artísticas</h3>
                        <ul class="text-white/90 space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-purple-300 mr-2"></i> Bellas Artes
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-purple-300 mr-2"></i> Diseño
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-purple-300 mr-2"></i> Música
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-purple-300 mr-2"></i> Escritura
                            </li>
                        </ul>
                        <button class="mt-6 px-4 py-2 bg-purple-600 hover:bg-purple-700 rounded-lg text-white text-sm transition-colors duration-300 flip-back">
                            Volver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Social -->
            <div class="flip-card h-80 scroll-animate">
                <div class="flip-card-inner w-full h-full rounded-xl shadow-lg">
                    <div class="flip-card-front glass-effect rounded-xl p-6 flex flex-col justify-between">
                        <div>
                            <div class="w-16 h-16 rounded-lg bg-green-500/20 flex items-center justify-center mb-4">
                                <i class="fas fa-users text-2xl text-green-400"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-green-400">Social (S)</h3>
                            <p class="text-gray-300 text-justify">
                                Personas cooperativas, empáticas y serviciales que disfrutan ayudar, enseñar o curar a otros.
                            </p>
                        </div>
                        <div class="text-sm text-gray-400 mt-4">
                            <p>Haz clic para ver carreras relacionadas</p>
                        </div>
                    </div>
                    <div class="flip-card-back bg-gradient-to-br from-green-900/80 to-green-800/80 rounded-xl p-6 flex flex-col justify-center">
                        <h3 class="text-xl font-bold mb-4 text-white text-center">Carreras Sociales</h3>
                        <ul class="text-white/90 space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-green-300 mr-2"></i> Docencia
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-green-300 mr-2"></i> Psicología
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-green-300 mr-2"></i> Trabajo Social
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-green-300 mr-2"></i> Enfermería
                            </li>
                        </ul>
                        <button class="mt-6 px-4 py-2 bg-green-600 hover:bg-green-700 rounded-lg text-white text-sm transition-colors duration-300 flip-back">
                            Volver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Emprendedor -->
            <div class="flip-card h-80 scroll-animate">
                <div class="flip-card-inner w-full h-full rounded-xl shadow-lg">
                    <div class="flip-card-front glass-effect rounded-xl p-6 flex flex-col justify-between">
                        <div>
                            <div class="w-16 h-16 rounded-lg bg-yellow-500/20 flex items-center justify-center mb-4">
                                <i class="fas fa-briefcase text-2xl text-yellow-400"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-yellow-400">Emprendedor (E)</h3>
                            <p class="text-gray-300 text-justify">
                                Personas energéticas, ambiciosas y persuasivas que disfrutan liderar, influir y tomar riesgos.
                            </p>
                        </div>
                        <div class="text-sm text-gray-400 mt-4">
                            <p>Haz clic para ver carreras relacionadas</p>
                        </div>
                    </div>
                    <div class="flip-card-back bg-gradient-to-br from-yellow-900/80 to-yellow-800/80 rounded-xl p-6 flex flex-col justify-center">
                        <h3 class="text-xl font-bold mb-4 text-white text-center">Carreras Emprendedoras</h3>
                        <ul class="text-white/90 space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-yellow-300 mr-2"></i> Administración
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-yellow-300 mr-2"></i> Ventas
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-yellow-300 mr-2"></i> Derecho
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-yellow-300 mr-2"></i> Política
                            </li>
                        </ul>
                        <button class="mt-6 px-4 py-2 bg-yellow-600 hover:bg-yellow-700 rounded-lg text-white text-sm transition-colors duration-300 flip-back">
                            Volver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Convencional -->
            <div class="flip-card h-80 scroll-animate">
                <div class="flip-card-inner w-full h-full rounded-xl shadow-lg">
                    <div class="flip-card-front glass-effect rounded-xl p-6 flex flex-col justify-between">
                        <div>
                            <div class="w-16 h-16 rounded-lg bg-indigo-500/20 flex items-center justify-center mb-4">
                                <i class="fas fa-chart-bar text-2xl text-indigo-400"></i>
                            </div>
                            <h3 class="text-xl font-bold  mb-2 text-orange-400">Convencional (C)</h3>
                            <p class="text-gray-300 text-justify">
                                Personas organizadas, detallistas y metódicas que disfrutan trabajar con datos y seguir procedimientos.
                            </p>
                        </div>
                        <div class="text-sm text-gray-400 mt-4">
                            <p>Haz clic para ver carreras relacionadas</p>
                        </div>
                    </div>
                    <div class="flip-card-back bg-gradient-to-br from-indigo-900/80 to-indigo-800/80 rounded-xl p-6 flex flex-col justify-center">
                        <h3 class="text-xl font-bold mb-4 text-white text-center">Carreras Convencionales</h3>
                        <ul class="text-white/90 space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-indigo-300 mr-2"></i> Contabilidad
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-indigo-300 mr-2"></i> Finanzas
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-indigo-300 mr-2"></i> Secretariado
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-caret-right text-indigo-300 mr-2"></i> Archivo
                            </li>
                        </ul>
                        <button class="mt-6 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 rounded-lg text-white text-sm transition-colors duration-300 flip-back">
                            Volver
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
  <section id="test" class="container mx-auto px-4 py-16 relative z-10">
      <div class="max-w-5xl mx-auto scroll-animate">
          <!-- Fondo decorativo -->
          <div class="relative">
              <!-- Elementos decorativos flotantes -->
              <div class="absolute -top-10 -left-10 w-32 h-32 bg-tec-500 rounded-full opacity-10 animate-pulse-slow"></div>
              <div class="absolute -bottom-8 -right-8 w-28 h-28 bg-valle-500 rounded-full opacity-15 animate-pulse-slow animation-delay-1000"></div>
              <div class="absolute top-1/4 right-1/4 w-16 h-16 bg-white rounded-full opacity-5 animate-float"></div>

              <!-- Contenedor principal con efecto glass mejorado -->
              <div class="glass-effect rounded-3xl p-8 md:p-12 relative overflow-hidden">
                  <!-- Patrón de fondo sutil -->
                  <div class="absolute inset-0 opacity-5">
                      <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-tec-400 to-valle-400"></div>
                  </div>

                  <!-- Contenido -->
                  <div class="relative z-10">
                      <!-- Encabezado con icono -->
                      <div class="text-center mb-8">
                          <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-r from-tec-500 to-valle-500 mb-6 shadow-lg">
                              <i class="fas fa-rocket text-3xl text-white"></i>
                          </div>
                          <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mb-4 bg-gradient-to-r from-white to-tec-200 bg-clip-text text-transparent">
                              ¿Listo para Descubrir tu <span class="text-valle-300">Vocación</span>?
                          </h2>
                      </div>

                      <!-- Grid de características -->
                      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                          <div class="text-center p-4 rounded-xl bg-white/5 hover:bg-white/10 transition-all duration-300">
                              <div class="w-12 h-12 rounded-lg bg-tec-500/20 flex items-center justify-center mb-3 mx-auto">
                                  <i class="fas fa-brain text-tec-300"></i>
                              </div>
                              <h4 class="font-semibold text-white mb-2">Test Científico</h4>
                              <p class="text-sm text-gray-300 text-justify">Basado en el modelo RIASEC validado internacionalmente</p>
                          </div>

                          <div class="text-center p-4 rounded-xl bg-white/5 hover:bg-white/10 transition-all duration-300">
                              <div class="w-12 h-12 rounded-lg bg-valle-500/20 flex items-center justify-center mb-3 mx-auto">
                                  <i class="fas fa-chart-pie text-valle-300"></i>
                              </div>
                              <h4 class="font-semibold text-white mb-2">Resultados Detallados</h4>
                              <p class="text-sm text-gray-300 text-justify">Análisis completo de tu perfil profesional</p>
                          </div>

                          <div class="text-center p-4 rounded-xl bg-white/5 hover:bg-white/10 transition-all duration-300">
                              <div class="w-12 h-12 rounded-lg bg-tec-500/20 flex items-center justify-center mb-3 mx-auto">
                                  <i class="fas fa-road text-tec-300"></i>
                              </div>
                              <h4 class="font-semibold text-white mb-2">Plan de Carrera</h4>
                              <p class="text-sm text-gray-300 text-justify">Ruta personalizada hacia tu éxito profesional</p>
                          </div>
                      </div>

                      <div class="max-w-3xl mx-auto mb-10">
                          <p class="text-lg md:text-xl text-gray-200 text-justify leading-relaxed">
                              Descubre tu verdadero potencial con nuestro test vocacional basado en el modelo RIASEC, obtén un informe personalizado que identifica tus fortalezas, intereses profesionales
                              y las carreras que mejor se adaptan a tu personalidad.
                              Toma el control de tu futuro hoy mismo.
                          </p>
                      </div>

                      <div class="text-center">
                          <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-6">

                              <a href="#riasec" class="group px-8 py-4 border-2 border-tec-400 hover:border-valle-400 hover:bg-white/5 text-tec-300 hover:text-valle-300 font-semibold rounded-2xl transition-all duration-300">
                                  <i class="fas fa-info-circle mr-2"></i>
                                  Más Información
                              </a>
                          </div>

                          <div class="flex flex-wrap justify-center items-center gap-8 text-sm text-gray-400 mt-8 pt-8 border-t border-white/10">
                              <div class="flex items-center">
                                  <i class="fas fa-shield-alt text-valle-400 mr-2"></i>
                                  <span>Resultados confidenciales</span>
                              </div>
                              <div class="flex items-center">
                                  <i class="fas fa-clock text-tec-400 mr-2"></i>
                                  <span>Solo 15-20 minutos</span>
                              </div>
                              <div class="flex items-center">
                                  <i class="fas fa-graduation-cap text-valle-400 mr-2"></i>
                                  <span>RIASEC</span>
                              </div>
                          </div>

                          <div class="mt-6 p-4 bg-gradient-to-r from-tec-900/30 to-valle-900/30 rounded-xl border border-tec-500/20">
                              <p class="text-tec-200 text-sm text-justify">
                                  <i class="fas fa-lightbulb text-valle-400 mr-2"></i>
                                  <strong>¿Sabías que?</strong> El 85% de las personas que realizan tests vocacionales toman decisiones más acertadas sobre su carrera profesional.
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

    <!-- Footer -->
    <footer class="container mx-auto px-4 py-8 border-t border-tec-800 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center space-x-3 mb-4 md:mb-0">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-r from-tec-500 to-valle-500 flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-white"></i>
                </div>
                <div>
                    <span class="text-xl font-bold">Inspiratec</span>
                    <p class="text-xs text-tec-300">TESVB Campus Valle de Bravo</p>
                </div>
            </div>
            <div class="text-center md:text-right text-tec-300">
                <p>© 2025 Tecnológico de Estudios Superiores de Valle de Bravo</p>
                <p class="text-sm mt-1">Plataforma de Orientación Vocacional</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                document.body.style.overflow = 'auto';
            }

            mobileMenuButton.addEventListener('click', openMenu);
            closeMobileMenu.addEventListener('click', closeMenu);
            mobileMenuOverlay.addEventListener('click', closeMenu);

            const menuLinks = mobileMenu.querySelectorAll('a');
            menuLinks.forEach(link => {
                link.addEventListener('click', closeMenu);
            });

            const flipCards = document.querySelectorAll('.flip-card');

            flipCards.forEach(card => {
                card.addEventListener('click', function() {
                    this.classList.toggle('flipped');
                });

                // Prevent flip back when clicking the back button
                const flipBackBtn = card.querySelector('.flip-back');
                if (flipBackBtn) {
                    flipBackBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        card.classList.remove('flipped');
                    });
                }
            });

            const scrollElements = document.querySelectorAll('.scroll-animate');

            const elementInView = (el, dividend = 1) => {
                const elementTop = el.getBoundingClientRect().top;
                return (
                    elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
                );
            };

            const displayScrollElement = (element) => {
                element.classList.add('visible');
            };

            const hideScrollElement = (element) => {
                element.classList.remove('visible');
            };

            const handleScrollAnimation = () => {
                scrollElements.forEach((el) => {
                    if (elementInView(el, 1.2)) {
                        displayScrollElement(el);
                    } else {
                        hideScrollElement(el);
                    }
                });
            };

            // Initial check
            handleScrollAnimation();

            // Listen for scroll events
            window.addEventListener('scroll', () => {
                handleScrollAnimation();
            });
        });
    </script>
</body>
</html>
