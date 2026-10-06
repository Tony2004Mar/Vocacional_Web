<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Reporte Vocacional - InspiraTec</title>
    <style>
        /* ===== CONFIGURACIÓN BASE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', 'Helvetica', 'Arial', sans-serif;
            background: #0a1a2e;
            padding: 15px;
            color: #ffffff;
            font-size: 11px;
        }

        .report-container {
            max-width: 1100px;
            margin: 0 auto;
            background: #0a1a2e;
            padding: 25px 30px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* ===== HEADER ===== */
        .header {
            text-align: center;
            padding-bottom: 18px;
            margin-bottom: 20px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.08);
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-bottom: 8px;
            flex-wrap: wrap;
        }

        .logo-container img {
            height: 55px;
            width: auto;
        }

        .logo-text h1 {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            margin: 0;
        }

        .logo-text .sub-brand {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.5);
        }

        .header-divider {
            width: 60px;
            height: 3px;
            background: #0080ff;
            border-radius: 4px;
            margin: 8px auto;
        }

        .student-name {
            font-size: 22px;
            font-weight: 700;
            color: #ffffff;
            margin-top: 6px;
        }

        .user-meta {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        .user-meta .meta-item {
            background: rgba(255, 255, 255, 0.06);
            padding: 4px 16px;
            border-radius: 20px;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.06);
            display: inline-block;
        }

        /* ===== HERO CARD ===== */
        .hero-card {
            background: rgba(0, 128, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .hero-card h2 {
            font-size: 22px;
            font-weight: 700;
            color: #ffffff;
        }

        .hero-card h2 span {
            color: #4dbe4d;
        }

        .hero-card p {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.5);
            margin-top: 4px;
        }

        /* ===== GLASS CARD ===== */
        .glass-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 18px 20px;
            margin-bottom: 18px;
        }

        .glass-card .card-title {
            font-size: 17px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 14px;
            padding-bottom: 8px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.06);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .glass-card .card-title .badge {
            margin-left: auto;
            background: rgba(255, 255, 255, 0.08);
            padding: 2px 14px;
            border-radius: 30px;
            font-size: 10px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.6);
        }

        /* ===== GRÁFICA DE BARRAS CON TABLA HTML ===== */
        .chart-table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px 0;
        }

        .chart-table tr {
            margin-bottom: 4px;
        }

        .chart-table td {
            padding: 4px 2px;
            vertical-align: middle;
        }

        .label-cell {
            width: 50px;
            text-align: right;
            padding-right: 10px;
            font-weight: 700;
            font-size: 14px;
            color: #ffffff;
            white-space: nowrap;
        }

        .label-cell small {
            display: block;
            font-weight: 400;
            font-size: 7px;
            color: rgba(255, 255, 255, 0.4);
        }

        .bar-cell {
            width: auto;
            padding-right: 8px;
        }

        .bar-bg {
            width: 100%;
            height: 26px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 4px;
            position: relative;
            overflow: hidden;
        }

        .bar-fill {
            height: 100%;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 8px;
            font-weight: 700;
            font-size: 12px;
            color: #ffffff;
            min-width: 30px;
        }

        .value-cell {
            width: 25px;
            text-align: left;
            font-weight: 700;
            font-size: 14px;
            color: #ffffff;
            padding-left: 4px;
        }

        /* Colores de barras */
        .bar-R { background: #ef4444; }
        .bar-I { background: #3b82f6; }
        .bar-A { background: #8b5cf6; }
        .bar-S { background: #10b981; }
        .bar-E { background: #f59e0b; }
        .bar-C { background: #6366f1; }

        /* ===== LEYENDA ===== */
        .chart-legend {
            text-align: center;
            padding-top: 12px;
            margin-top: 8px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .legend-item {
            display: inline-block;
            margin: 0 10px 4px 0;
            font-size: 10px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.7);
        }

        .legend-dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 3px;
            margin-right: 4px;
            vertical-align: middle;
        }

        .dot-R { background: #ef4444; }
        .dot-I { background: #3b82f6; }
        .dot-A { background: #8b5cf6; }
        .dot-S { background: #10b981; }
        .dot-E { background: #f59e0b; }
        .dot-C { background: #6366f1; }

        /* ===== TOP 3 ===== */
        .top-areas-grid {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .top-area-item {
            flex: 1;
            min-width: 140px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 12px 16px;
            border: 1px solid rgba(255, 255, 255, 0.06);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .rank-circle {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 15px;
            flex-shrink: 0;
            background: rgba(255, 255, 255, 0.08);
            border: 2px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        .rank-circle.gold { 
            background: #f59e0b;
            border-color: #f59e0b;
        }
        .rank-circle.silver { 
            background: #9ca3af;
            border-color: #9ca3af;
        }
        .rank-circle.bronze { 
            background: #d97706;
            border-color: #d97706;
        }

        .area-name {
            font-weight: 700;
            font-size: 14px;
            color: #ffffff;
        }

        .area-desc {
            font-size: 9px;
            color: rgba(255, 255, 255, 0.4);
        }

        /* ===== DESCRIPCIONES ===== */
        .profile-descs {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .profile-desc-item {
            padding: 8px 12px;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.03);
            margin-bottom: 4px;
            border-left: 3px solid #0080ff;
        }

        .profile-desc-item h4 {
            font-weight: 600;
            font-size: 12px;
            color: #ffffff;
        }

        .profile-desc-item p {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.5);
        }

        /* ===== CARRERAS ===== */
        .career-category {
            margin-bottom: 14px;
        }

        .career-category:last-child {
            margin-bottom: 0;
        }

        .category-header {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            padding-bottom: 5px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .category-header h4 {
            font-size: 14px;
            font-weight: 700;
            color: #ffffff;
        }

        .category-header .cat-count {
            background: rgba(255, 255, 255, 0.06);
            color: rgba(255, 255, 255, 0.5);
            font-size: 9px;
            font-weight: 600;
            padding: 1px 10px;
            border-radius: 30px;
            margin-left: auto;
        }

        .career-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
        }

        .career-item {
            flex: 1 1 calc(50% - 4px);
            min-width: 200px;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 6px;
            padding: 7px 14px;
            border: 1px solid rgba(255, 255, 255, 0.04);
            font-size: 11px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.85);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .career-item .career-tag {
            margin-left: auto;
            background: rgba(255, 255, 255, 0.06);
            color: rgba(255, 255, 255, 0.4);
            font-size: 7px;
            font-weight: 700;
            padding: 1px 8px;
            border-radius: 30px;
            text-transform: uppercase;
            flex-shrink: 0;
        }

        .career-tag.tag-R { background: rgba(239, 68, 68, 0.15); color: #ef4444; }
        .career-tag.tag-I { background: rgba(59, 130, 246, 0.15); color: #3b82f6; }
        .career-tag.tag-A { background: rgba(139, 92, 246, 0.15); color: #8b5cf6; }
        .career-tag.tag-S { background: rgba(16, 185, 129, 0.15); color: #10b981; }
        .career-tag.tag-E { background: rgba(245, 158, 11, 0.15); color: #f59e0b; }
        .career-tag.tag-C { background: rgba(99, 102, 241, 0.15); color: #6366f1; }

        /* ===== FOOTER ===== */
        .footer {
            text-align: center;
            padding-top: 16px;
            margin-top: 20px;
            border-top: 2px solid rgba(255, 255, 255, 0.06);
        }

        .footer .footer-divider {
            width: 40px;
            height: 2px;
            background: #0080ff;
            border-radius: 4px;
            margin: 6px auto;
        }

        .footer .footer-logo {
            font-size: 14px;
            font-weight: 700;
            color: #ffffff;
        }

        .footer p {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.25);
            margin: 2px 0;
        }

        /* ===== IMPRESIÓN ===== */
        @page {
            margin: 10mm 8mm;
            size: A4;
        }

        @media print {
            body {
                background: #0a1a2e;
                padding: 8px;
                font-size: 10px;
            }

            .report-container {
                padding: 18px 22px;
            }

            .glass-card {
                padding: 14px 16px;
                margin-bottom: 14px;
            }

            .hero-card {
                padding: 16px;
                margin-bottom: 16px;
            }

            .career-item {
                padding: 5px 10px;
                font-size: 10px;
            }

            .top-area-item {
                padding: 10px 14px;
            }
        }
    </style>
</head>
<body>
<div class="report-container">

    <!-- ===== HEADER ===== -->
    <div class="header">
        <div class="logo-container">
            <img src="{{ public_path('images/logo_tec.png') }}" alt="Tecnológico de Estudios Superiores de Valle de Bravo">
            <div class="logo-text">
                <h1>InspiraTec</h1>
                <div class="sub-brand">Tecnológico de Estudios Superiores de Valle de Bravo</div>
            </div>
        </div>

        <div class="header-divider"></div>

        <div class="student-name">
            {{ $alumno->nombre ?? 'Alumno' }} {{ $alumno->apellido ?? '' }}
        </div>

        <div class="user-meta">
            <span class="meta-item">Usuario: {{ $user->name ?? $user->nombre ?? 'Usuario' }}</span>
            <span class="meta-item">Fecha: {{ $fecha ?? date('d/m/Y') }}</span>
            <span class="meta-item">Perfil Vocacional</span>
        </div>
    </div>

    <!-- ===== HERO CARD ===== -->
    <div class="hero-card">
        <h2>¡Test <span>Completado</span>!</h2>
        <p>Descubre tu perfil vocacional y las carreras que mejor se adaptan a tu personalidad</p>
    </div>

    <!-- ===== GRÁFICA DE BARRAS CON TABLA HTML ===== -->
    <div class="glass-card">
        <div class="card-title">
            Perfil Vocacional RIASEC
            <span class="badge">Resultados</span>
        </div>

        <div>
            @php
                $maxValor = max($puntos) > 0 ? max($puntos) : 1;
                $nombresCategorias = [
                    'R' => 'Realista',
                    'I' => 'Investigador',
                    'A' => 'Artístico',
                    'S' => 'Social',
                    'E' => 'Emprendedor',
                    'C' => 'Convencional'
                ];
                $coloresMap = [
                    'R' => 'bar-R',
                    'I' => 'bar-I',
                    'A' => 'bar-A',
                    'S' => 'bar-S',
                    'E' => 'bar-E',
                    'C' => 'bar-C'
                ];
                $letras = ['R', 'I', 'A', 'S', 'E', 'C'];
            @endphp

            <table class="chart-table">
                @foreach($letras as $letra)
                    @php
                        $valor = $puntos[$letra] ?? 0;
                        $porcentaje = ($valor / $maxValor) * 100;
                        $porcentaje = max($porcentaje, 5);
                        $colorClase = $coloresMap[$letra] ?? 'bar-R';
                        $nombreCategoria = $nombresCategorias[$letra] ?? '';
                    @endphp
                    <tr>
                        <td class="label-cell">
                            {{ $letra }}
                            <small>{{ $nombreCategoria }}</small>
                        </td>
                        <td class="bar-cell">
                            <div class="bar-bg">
                                <div class="bar-fill {{ $colorClase }}" style="width: {{ $porcentaje }}%;">
                                    {{ $valor }}
                                </div>
                            </div>
                        </td>
                        <td class="value-cell">{{ $valor }}</td>
                    </tr>
                @endforeach
            </table>

            <div class="chart-legend">
                @foreach($puntos as $letra => $valor)
                    <span class="legend-item">
                        <span class="legend-dot dot-{{ $letra }}"></span>
                        {{ $letra }} - {{ $nombresCategorias[$letra] ?? '' }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>

    <!-- ===== TOP 3 ÁREAS ===== -->
    <div class="glass-card">
        <div class="card-title">
            Tus 3 principales áreas de interés
            <span class="badge">Top</span>
        </div>

        <div class="top-areas-grid">
            @foreach($topCategorias as $index => $nombreArea)
                @php
                    $clasesRank = ['gold', 'silver', 'bronze'];
                    $clase = $clasesRank[$index] ?? '';
                @endphp
                <div class="top-area-item">
                    <div class="rank-circle {{ $clase }}">{{ $index + 1 }}</div>
                    <div>
                        <div class="area-name">{{ $nombreArea }}</div>
                        <div class="area-desc">Área destacada</div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Descripciones -->
        <div class="profile-descs">
            @php
                $descriptions = [
                    'Realista' => 'Personas prácticas y mecánicas que disfrutan trabajar con herramientas y máquinas.',
                    'Investigador' => 'Personas analíticas e intelectuales con gran curiosidad científica.',
                    'Artístico' => 'Personas creativas y expresivas con sensibilidad estética.',
                    'Social' => 'Personas cooperativas y serviciales con gran empatía.',
                    'Emprendedor' => 'Personas ambiciosas y persuasivas con habilidades de liderazgo.',
                    'Convencional' => 'Personas organizadas y detallistas que prefieren ambientes estructurados.'
                ];
            @endphp
            @foreach($topCategorias as $nombreArea)
                <div class="profile-desc-item" style="border-left-color: 
                    @if($nombreArea == 'Realista') #ef4444
                    @elseif($nombreArea == 'Investigador') #3b82f6
                    @elseif($nombreArea == 'Artístico') #8b5cf6
                    @elseif($nombreArea == 'Social') #10b981
                    @elseif($nombreArea == 'Emprendedor') #f59e0b
                    @else #6366f1
                    @endif">
                    <h4>{{ $nombreArea }}</h4>
                    <p>{{ $descriptions[$nombreArea] ?? 'Descripción no disponible' }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- ===== CARRERAS ===== -->
    <div class="glass-card">
        <div class="card-title">
            Carreras Recomendadas
            <span class="badge">{{ $carreras->count() }} opciones</span>
        </div>

        @php
            $agrupadas = $carreras->groupBy('categoria');
            $tagsCat = [
                'Realista' => 'tag-R',
                'Investigador' => 'tag-I',
                'Artístico' => 'tag-A',
                'Social' => 'tag-S',
                'Emprendedor' => 'tag-E',
                'Convencional' => 'tag-C'
            ];
        @endphp

        @foreach($agrupadas as $categoria => $grupo)
            <div class="career-category">
                <div class="category-header">
                    <h4>{{ $categoria }}</h4>
                    <span class="cat-count">{{ $grupo->count() }}</span>
                </div>
                <div class="career-grid">
                    @foreach($grupo as $carrera)
                        <div class="career-item">
                            {{ $carrera->nombre }}
                            <span class="career-tag {{ $tagsCat[$categoria] ?? '' }}">{{ $categoria }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        @if($carreras->isEmpty())
            <div style="background: rgba(255, 193, 7, 0.06); border-radius: 8px; padding: 18px; text-align: center; border: 2px dashed rgba(255, 193, 7, 0.1);">
                <p style="font-size: 13px; margin: 0; color: rgba(255, 255, 255, 0.5);">No se encontraron carreras asociadas a tus resultados.</p>
            </div>
        @endif
    </div>

    <!-- ===== FOOTER ===== -->
    <div class="footer">
        <div class="footer-divider"></div>
        <div class="footer-logo">© 2025 InspiraTec</div>
        <p>Tecnológico de Estudios Superiores de Valle de Bravo</p>
        <p style="font-size: 9px; color: rgba(255, 255, 255, 0.2); margin-top: 3px;">
            Reporte generado automáticamente a partir de tus respuestas
        </p>
    </div>

</div>
</body>
</html>