<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;
    protected $fillable = [
        "assistance_id",
        "workshop_id",
        "title",
        "description",
        "time", // Tiempo en minutos
        "price",
        "status", //  0 enviado // 1 aceptadp
        ];


    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function assistance()
    {
        return $this->belongsTo(Assistance::class);
    }
}
