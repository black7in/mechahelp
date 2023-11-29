<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "workshop_id",
        "phone",
        "speciality",
        "status"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }


}
