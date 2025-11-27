<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelEducativo extends Model
{
    use HasFactory;

    protected $table = 'niveles_educativos';

    protected $fillable = ['descripcion'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
