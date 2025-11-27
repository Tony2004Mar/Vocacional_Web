<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model {
    protected $table = 'respuestas';
    protected $primaryKey = 'id_respuesta';
    protected $guarded = [];

    public function pregunta(){ return $this->belongsTo(Pregunta::class,'id_pregunta','id_pregunta'); }
    public function test(){ return $this->belongsTo(Test::class,'id_test','id_test'); }
}
