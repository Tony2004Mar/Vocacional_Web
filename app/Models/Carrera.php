<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'carreras';
    protected $primaryKey = 'id_carrera';
    protected $fillable = ['nombre', 'descripcion'];

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
}
