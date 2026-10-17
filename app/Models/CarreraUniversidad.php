<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarreraUniversidad extends Model
{
    use HasFactory;

    protected $table = 'carrera_universidad';
    protected $primaryKey = 'id_carrera_universidad';

    protected $fillable = [
        'id_carrera',
        'id_universidad',
        'duracion',
        'modalidad',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    /**
     * Relación con Carrera
     */
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera', 'id_carrera');
    }

    /**
     * Relación con Universidad
     */
    public function universidad()
    {
        return $this->belongsTo(Universidad::class, 'id_universidad', 'id_universidad');
    }
}