<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    use HasFactory;

    protected $table = 'universidades';
    protected $primaryKey = 'id_universidad';

    protected $fillable = [
        'nombre',
        'siglas',
        'tipo',
        'estado',
        'ciudad',
        'direccion',
        'latitud',
        'longitud',
        'ubicacion_url',
        'sitio_web',
    ];

    /**
     * Relación: una universidad imparte muchas carreras
     */
    public function carreras()
    {
        return $this->belongsToMany(
            Carrera::class,
            'carrera_universidad',
            'id_universidad',
            'id_carrera'
        )
        ->withPivot('duracion', 'modalidad', 'activo')
        ->withTimestamps();
    }

    /**
     * Relación: registros en la tabla pivote
     */
    public function carreraUniversidades()
    {
        return $this->hasMany(CarreraUniversidad::class, 'id_universidad', 'id_universidad');
    }
}