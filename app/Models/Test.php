<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model {
    protected $table = 'tests';
    protected $primaryKey = 'id_test';
    protected $guarded = [];


    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_finalizacion' => 'datetime',
    ];



    public function alumno(){
        return $this->belongsTo(Alumno::class,'id_alumno','id_alumno');
    }

    public function resultado(){
        return $this->hasOne(Resultado::class,'id_test','id_test');
    }

   public function estado()
   {
       return $this->belongsTo(Estado::class, 'id_estado', 'id_estado');
   }

    public function respuestasTemporales()
    {
        return $this->hasMany(RespuestaTemporal::class, 'id_test', 'id_test');
    }


}
