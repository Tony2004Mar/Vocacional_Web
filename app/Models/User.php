<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Alumno;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'ap',
        'am',
        'edad',
        'genero_id',
        'nivel_educativo_id',
        'intereses',
        'email',
        'password',
        'rol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 🔹 Relaciones
    public function alumno()
    {
        return $this->hasOne(Alumno::class, 'id_usuario');
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    public function nivelEducativo()
    {
        return $this->belongsTo(NivelEducativo::class);
    }

   protected static function booted()
   {
       static::created(function ($user) {
           if ($user->rol === 'estudiante') {
               Alumno::create([
                   'user_id' => $user->id,
               ]);
           }
       });
    }
}
