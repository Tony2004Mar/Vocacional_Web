<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';
    protected $primaryKey = 'id_alumno';
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación con los tests del alumno
     */
    public function tests()
    {
        return $this->hasMany(Test::class, 'id_alumno', 'id_alumno');
    }
}
