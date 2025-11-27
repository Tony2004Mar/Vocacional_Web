<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Vocacional - InspiraTec</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 40px;
            background: #f7faff;
            color: #333;
        }

        .container {
            background: white;
            border-radius: 12px;
            padding: 30px 40px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #0078d7;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .header img {
            height: 80px;
            margin-bottom: 10px;
        }

        .title {
            font-size: 26px;
            color: #0078d7;
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 18px;
            color: #444;
            margin-bottom: 4px;
        }

        .section {
            margin-bottom: 25px;
        }

        .section h3 {
            color: #0078d7;
            border-left: 5px solid #0078d7;
            padding-left: 10px;
            margin-bottom: 10px;
        }

        /* Gráfica */
        .chart {
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            height: 220px;
            margin-top: 30px;
        }

        .bar {
            width: 45px;
            border-radius: 8px 8px 0 0;
            text-align: center;
            color: #fff;
            font-weight: bold;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            font-size: 14px;
        }

        .label {
            text-align: center;
            margin-top: 6px;
            font-weight: 600;
        }

        /* Colores RIASEC */
        .R { background: #f44336; }
        .I { background: #2196f3; }
        .A { background: #9c27b0; }
        .S { background: #4caf50; }
        .E { background: #ff9800; }
        .C { background: #009688; }

        .carrera-card {
            background: #eef5ff;
            border-left: 5px solid #0078d7;
            padding: 10px 12px;
            margin-bottom: 8px;
            border-radius: 6px;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            border-top: 1px solid #ccc;
            padding-top: 10px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <img src="{{ public_path('images/logo_tec.png') }}" alt="Logo Tec">
        <h1 class="title">Reporte Vocacional - InspiraTec</h1>
        <p class="subtitle">{{ $alumno->nombre }} {{ $alumno->apellido ?? '' }}</p>
        <p><strong>Usuario:</strong> {{ $user->name ?? $user->nombre }}</p>
        <p><strong>Fecha de emisión:</strong> {{ $fecha }}</p>
    </div>

    <div class="section">
        <h3>Resultados del Test RIASEC</h3>
        <div class="chart">
            @foreach($puntos as $letra => $valor)
                <div>
                    <div class="bar {{ $letra }}" style="height: {{ max($valor * 8 + 10, 20) }}px;">
                        {{ $valor }}
                    </div>
                    <div class="label">{{ $letra }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="section">
        <h3>Tus tres principales áreas de interés</h3>
        <ol>
            @foreach($topCategorias as $cat)
                <li><strong>{{ $cat }}</strong> — área destacada en tu perfil vocacional</li>
            @endforeach
        </ol>
    </div>

    <div class="section">
        <h3>Carreras Recomendadas</h3>
        @php
            $agrupadas = $carreras->groupBy('categoria');
        @endphp
        @foreach($agrupadas as $categoria => $grupo)
            <h4 style="color:#0078d7; margin-top:15px;">{{ $categoria }}</h4>
            @foreach($grupo as $carrera)
                <div class="carrera-card">
                    🎓 {{ $carrera->nombre }}
                </div>
            @endforeach
        @endforeach

        @if($carreras->isEmpty())
            <p>No se encontraron carreras asociadas a tus resultados.</p>
        @endif
    </div>

    <div class="footer">
        <p>© 2025 InspiraTec - Tecnológico de Estudios Superiores de Valle de Bravo</p>
    </div>
</div>
</body>
</html>
