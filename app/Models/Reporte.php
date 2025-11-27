<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $table = 'reportes';
    protected $primaryKey = 'id_reporte';
    protected $fillable = [
        'id_alumno',
        'id_test',
        'nombre_archivo',
        'ruta_archivo',
    ];

    // Relaciones
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumno', 'id_alumno');
    }

    public function test()
    {
        return $this->belongsTo(Test::class, 'id_test', 'id_test');
    }
}
