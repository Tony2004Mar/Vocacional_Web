<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CategoriaRiasec extends Model {
    protected $table = 'categorias_riasec';
    protected $primaryKey = 'id_categoria';
    protected $guarded = [];

    public function preguntas(){ return $this->hasMany(Pregunta::class,'id_categoria','id_categoria'); }
    public function carreras(){ return $this->belongsToMany(Carrera::class,'carrera_categoria','id_categoria','id_carrera'); }
}
