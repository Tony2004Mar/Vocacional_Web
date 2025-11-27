<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model {
    protected $table = 'preguntas';
    protected $primaryKey = 'id_pregunta';
    protected $guarded = [];

    public function categoria(){ return $this->belongsTo(CategoriaRiasec::class,'id_categoria','id_categoria'); }
}
