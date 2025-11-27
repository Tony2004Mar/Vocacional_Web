<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
