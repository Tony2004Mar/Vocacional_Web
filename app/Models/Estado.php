<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    protected $primaryKey = 'id_estado';
    protected $fillable = ['nombre', 'descripcion'];



    public function tests()
    {
        return $this->hasMany(Test::class, 'id_estado');
    }
}


