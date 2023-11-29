<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    use HasFactory;
    protected $fillable = [
        "client_id",
        "workshop_id",
        "vehicle_id",
        "title",
        "description",
        "lat",
        "lng",
        "status",
        "price"
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }

    public function tarea()
    {
        return $this->hasOne(Tarea::class);
    }

}
