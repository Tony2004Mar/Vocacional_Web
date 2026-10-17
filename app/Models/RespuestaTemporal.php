<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaTemporal extends Model
{
    use HasFactory;

    protected $table = 'respuestas_temporales';
    protected $primaryKey = 'id_respuesta_temporal';

    protected $fillable = [
        'id_test',
        'id_pregunta',
        'respuesta',
    ];

    /**
     * Relación con Test
     */
    public function test()
    {
        return $this->belongsTo(Test::class, 'id_test', 'id_test');
    }

    /**
     * Relación con Pregunta
     */
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'id_pregunta', 'id_pregunta');
    }
}