<?php

namespace App\Services;

use App\Models\Carrera;

class GroqService
{
    /**
     * Responde preguntas sobre una carrera usando SOLO datos de la BD.
     * No usa IA, no usa internet, no usa API keys.
     */
    public function preguntarSobreCarrera(string $nombreCarrera, string $pregunta, array $contextoAlumno = []): array
    {
        // Buscar carrera en BD
        $carrera = Carrera::where('nombre', $nombreCarrera)->first();

        if (!$carrera) {
            return [
                'success' => false,
                'respuesta' => 'No encontré información sobre esa carrera.',
            ];
        }

        // Obtener universidades con duración
        $universidades = $carrera->universidades()
            ->wherePivot('activo', 1)
            ->get();

        // Detectar intención
        $intencion = $this->detectarIntencion($pregunta);

        // Generar respuesta según intención
        $respuesta = $this->generarRespuesta($intencion, $carrera, $universidades, $pregunta);

        return [
            'success' => true,
            'respuesta' => $respuesta,
        ];
    }

    /**
     * Detecta la intención de la pregunta por palabras clave.
     */
    protected function detectarIntencion(string $pregunta): string
    {
        $p = mb_strtolower($pregunta);

        // Ubicación / dónde estudiar
        if ($this->contiene($p, ['dónde', 'donde', 'estudiar', 'universidad', 'universidades', 'carrera en', 'imparten', 'oferta'])) {
            return 'ubicaciones';
        }

        // Duración
        if ($this->contiene($p, ['dura', 'duración', 'duracion', 'semestres', 'años', 'cuánto tiempo', 'cuanto tiempo'])) {
            return 'duracion';
        }

        // Campo laboral
        if ($this->contiene($p, ['campo', 'laboral', 'trabajar', 'trabajo', 'empleo', 'salida', 'egresado', 'gana', 'sueldo', 'salario'])) {
            return 'campo_laboral';
        }

        // Descripción / qué es
        if ($this->contiene($p, ['descripción', 'descripcion', 'qué es', 'que es', 'acerca', 'trata', 'consiste', 'sobre la carrera'])) {
            return 'descripcion';
        }

        // Cerca de Valle de Bravo
        if ($this->contiene($p, ['cerca', 'valle', 'valle de bravo', 'cercana', 'cercanas'])) {
            return 'cerca_valle';
        }

        // Públicas o privadas
        if ($this->contiene($p, ['pública', 'publica', 'públicas', 'privada', 'privadas', 'gratis', 'gratuita'])) {
            return 'tipo_universidad';
        }

        // Requisitos
        if ($this->contiene($p, ['requisito', 'requisitos', 'entrar', 'ingresar', 'ingreso', 'admision', 'admisión'])) {
            return 'requisitos';
        }

        // Saludo
        if ($this->contiene($p, ['hola', 'buenas', 'hey', 'qué tal', 'que tal'])) {
            return 'saludo';
        }

        // Ayuda
        if ($this->contiene($p, ['ayuda', 'opciones', 'qué puedo', 'que puedo', 'preguntar'])) {
            return 'ayuda';
        }

        return 'desconocida';
    }

    protected function contiene(string $texto, array $palabras): bool
    {
        foreach ($palabras as $palabra) {
            if (mb_strpos($texto, $palabra) !== false) {
                return true;
            }
        }
        return false;
    }

    /**
     * Genera la respuesta según la intención.
     */
    protected function generarRespuesta(string $intencion, $carrera, $universidades, string $preguntaOriginal): string
    {
        switch ($intencion) {
            case 'ubicaciones':
                return $this->respuestaUbicaciones($carrera, $universidades);

            case 'duracion':
                return $this->respuestaDuracion($carrera, $universidades);

            case 'campo_laboral':
                return $this->respuestaCampoLaboral($carrera);

            case 'descripcion':
                return $this->respuestaDescripcion($carrera);

            case 'cerca_valle':
                return $this->respuestaCercaValle($carrera, $universidades);

            case 'tipo_universidad':
                return $this->respuestaTipoUniversidad($carrera, $universidades);

            case 'requisitos':
                return $this->respuestaRequisitos();

            case 'saludo':
                return "¡Hola! 👋 Soy tu asistente vocacional de Inspiratec. Estoy aquí para ayudarte con información sobre <strong>{$carrera->nombre}</strong>.<br><br>Puedes preguntarme sobre:<br>• 📍 ¿Dónde puedo estudiarla?<br>• ⏱️ ¿Cuánto dura?<br>• 💼 ¿Qué campo laboral tiene?<br>• 📖 ¿De qué trata?";

            case 'ayuda':
                return "Puedo ayudarte a saber:<br><br>• 📍 <strong>¿Dónde estudiarla?</strong> – Universidades en México<br>• ⏱️ <strong>¿Cuánto dura?</strong> – Semestres de cada universidad<br>• 💼 <strong>¿Campo laboral?</strong> – Dónde puedes trabajar<br>• 📖 <strong>¿De qué trata?</strong> – Descripción de la carrera<br>• 📌 <strong>¿Hay cerca de Valle de Bravo?</strong><br><br>¡Pregunta lo que necesites!";

            default:
                return $this->respuestaDesconocida($carrera, $universidades);
        }
    }

    // ============================================
    // RESPUESTAS ESPECÍFICAS
    // ============================================

    protected function respuestaUbicaciones($carrera, $universidades): string
    {
        if ($universidades->isEmpty()) {
            return "Actualmente no tengo universidades registradas para <strong>{$carrera->nombre}</strong> en mi base de datos.";
        }

        $html = "¡Claro! Puedes estudiar <strong>{$carrera->nombre}</strong> en estas universidades de México:<br><br>";

        foreach ($universidades as $u) {
            $html .= "🎓 <strong>{$u->nombre}</strong>";
            if ($u->siglas) {
                $html .= " ({$u->siglas})";
            }
            $html .= "<br>";

            if ($u->ciudad && $u->estado) {
                $html .= "📍 {$u->ciudad}, {$u->estado}<br>";
            }

            if ($u->ubicacion_url) {
                $html .= "🗺️ <a href=\"{$u->ubicacion_url}\" target=\"_blank\" style=\"color: #4db3ff;\">Ver ubicación en Google Maps</a><br>";
            }

            if ($u->pivot->duracion) {
                $html .= "⏱️ Duración: {$u->pivot->duracion}<br>";
            }

            if ($u->tipo) {
                $tipo = $u->tipo === 'publica' ? '🏛️ Pública' : '💼 Privada';
                $html .= "{$tipo}<br>";
            }

            $html .= "<br>";
        }

        $html .= "<em>Revisa cada opción y elige la que mejor se adapte a ti.</em>";
        return $html;
    }

    protected function respuestaDuracion($carrera, $universidades): string
    {
        if ($universidades->isEmpty()) {
            return "No tengo información de duración para <strong>{$carrera->nombre}</strong> en mi base de datos.";
        }

        $html = "⏱️ <strong>Duración de {$carrera->nombre}</strong><br><br>";
        $html .= "La duración varía según la universidad:<br><br>";

        foreach ($universidades as $u) {
            $siglas = $u->siglas ?? $u->nombre;
            $duracion = $u->pivot->duracion ?? 'No especificada';
            $html .= "• <strong>{$siglas}</strong>: {$duracion}<br>";
        }

        $html .= "<br><em>La mayoría de las universidades ofrecen esta carrera en 8 a 10 semestres (4-5 años).</em>";
        return $html;
    }

    protected function respuestaCampoLaboral($carrera): string
    {
        $campo = $carrera->campo_laboral;

        if (empty($campo)) {
            return "No tengo información específica sobre el campo laboral de <strong>{$carrera->nombre}</strong> en mi base de datos.";
        }

        $html = "💼 <strong>Campo laboral de {$carrera->nombre}</strong><br><br>";
        $html .= $campo . "<br><br>";
        $html .= "<em>Esta es la información oficial registrada en Inspiratec.</em>";
        return $html;
    }

    protected function respuestaDescripcion($carrera): string
    {
        $desc = $carrera->descripcion;

        if (empty($desc)) {
            return "No tengo una descripción detallada de <strong>{$carrera->nombre}</strong> en mi base de datos.";
        }

        $html = "📖 <strong>Sobre {$carrera->nombre}</strong><br><br>";
        $html .= $desc . "<br><br>";

        if ($carrera->campo_laboral) {
            $html .= "<strong>💼 Campo laboral:</strong><br>";
            $html .= $carrera->campo_laboral . "<br>";
        }

        return $html;
    }

    protected function respuestaCercaValle($carrera, $universidades): string
    {
        // Filtrar universidades en Estado de México
        $cerca = $universidades->filter(function ($u) {
            return $u->estado && (
                mb_strpos(mb_strtolower($u->estado), 'mexico') !== false ||
                mb_strpos(mb_strtolower($u->estado), 'méxico') !== false
            );
        });

        if ($cerca->isEmpty()) {
            $html = "No tengo registradas universidades del Estado de México que impartan <strong>{$carrera->nombre}</strong>.<br><br>";
            $html .= "Pero estas universidades nacionales la ofrecen:<br><br>";

            foreach ($universidades->take(3) as $u) {
                $html .= "• <strong>{$u->nombre}</strong> ({$u->ciudad}, {$u->estado})<br>";
            }

            return $html;
        }

        $html = "📌 Universidades cerca de Valle de Bravo que imparten <strong>{$carrera->nombre}</strong>:<br><br>";

        foreach ($cerca as $u) {
            $html .= "🎓 <strong>{$u->nombre}</strong><br>";
            $html .= "📍 {$u->ciudad}, {$u->estado}<br>";
            if ($u->ubicacion_url) {
                $html .= "🗺️ <a href=\"{$u->ubicacion_url}\" target=\"_blank\" style=\"color: #4db3ff;\">Ver en Maps</a><br>";
            }
            $html .= "<br>";
        }

        return $html;
    }

    protected function respuestaTipoUniversidad($carrera, $universidades): string
    {
        $publicas = $universidades->filter(fn($u) => $u->tipo === 'publica');
        $privadas = $universidades->filter(fn($u) => $u->tipo === 'privada');

        $html = "🏛️ <strong>Universidades por tipo para {$carrera->nombre}</strong><br><br>";

        if ($publicas->isNotEmpty()) {
            $html .= "<strong>Públicas:</strong><br>";
            foreach ($publicas as $u) {
                $html .= "• {$u->nombre}";
                if ($u->siglas) $html .= " ({$u->siglas})";
                $html .= " – {$u->ciudad}<br>";
            }
            $html .= "<br>";
        }

        if ($privadas->isNotEmpty()) {
            $html .= "<strong>Privadas:</strong><br>";
            foreach ($privadas as $u) {
                $html .= "• {$u->nombre}";
                if ($u->siglas) $html .= " ({$u->siglas})";
                $html .= " – {$u->ciudad}<br>";
            }
        }

        return $html;
    }

    protected function respuestaRequisitos(): string
    {
        return "📋 <strong>Requisitos generales para ingresar</strong><br><br>"
            . "Cada universidad tiene su propio proceso de admisión, pero los requisitos generales son:<br><br>"
            . "• Certificado de bachillerato<br>"
            . "• Examen de admisión (varía por universidad)<br>"
            . "• CURP y acta de nacimiento<br>"
            . "• Cumplir con el puntaje mínimo<br><br>"
            . "<em>Te recomiendo consultar la página oficial de cada universidad para los requisitos exactos.</em>";
    }

    protected function respuestaDesconocida($carrera, $universidades): string
    {
        $html = "No entendí bien tu pregunta sobre <strong>{$carrera->nombre}</strong>.<br><br>";
        $html .= "Puedo ayudarte con esto:<br><br>";
        $html .= "• 📍 <strong>¿Dónde puedo estudiarla?</strong><br>";
        $html .= "• ⏱️ <strong>¿Cuánto dura?</strong><br>";
        $html .= "• 💼 <strong>¿Qué campo laboral tiene?</strong><br>";
        $html .= "• 📖 <strong>¿De qué trata?</strong><br>";
        $html .= "• 📌 <strong>¿Hay cerca de Valle de Bravo?</strong><br><br>";
        $html .= "Intenta reformular tu pregunta. 😊";

        return $html;
    }
}