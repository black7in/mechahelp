<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $fillable = [
        "technician_id",
        "assistance_id",
        "title",
        "ref",
        "detail",
        "status",
    ];

    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }

    public function assistance()
    {
        return $this->belongsTo(Assistance::class);
    }

















}
