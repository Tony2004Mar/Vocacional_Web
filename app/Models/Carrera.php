<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'carreras';
    protected $primaryKey = 'id_carrera';
    protected $fillable = ['nombre', 'descripcion','campo_laboral'];

    public $timestamps = true;

    public function categorias()
    {
        return $this->belongsToMany(
            CategoriaRiasec::class,
            'carrera_categoria',
            'id_carrera',
            'id_categoria'
        );
    }

        /**
     * Relación: una carrera puede ser impartida por muchas universidades
     */
    public function universidades()
    {
        return $this->belongsToMany(
            Universidad::class,
            'carrera_universidad',
            'id_carrera',
            'id_universidad'
        )
        ->withPivot('duracion', 'modalidad', 'activo')
        ->withTimestamps();
    }

    /**
     * Relación: registros en la tabla pivote
     */
    public function carreraUniversidades()
    {
        return $this->hasMany(CarreraUniversidad::class, 'id_carrera', 'id_carrera');
    }
}
