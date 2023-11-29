<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'city',
        'slogan',
        'nit',
        'status',
        'user_id',
        'striker',
        'fecha_silenciado'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assistances()
    {
        return $this->hasMany(Assistance::class);
    }

    public function technicians()
    {
        return $this->hasMany(Technician::class);
    }
    public function respuesta()
    {
        return $this->hasMany(Respuesta::class);
    }

    public function agregarStrike()
    {
        $this->strikes++;

        if ($this->strikes == 1) {
            // Si es el primer strike silenciar por 1 día
            $this->fecha_silenciado = now()->addDay();
        } elseif ($this->strikes == 2) {
            // Si son 2 strikes silenciar por 3 días
            $this->fecha_silenciado = now()->addDays(3);
        } elseif ($this->strikes > 2) {
            // Si son más de 2 strikes silenciar por 1 semana
            $this->fecha_silenciado = now()->addWeek();
        }

        $this->save();
    }
}
