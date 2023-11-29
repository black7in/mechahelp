<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_id","marca","año","modelo","placa",
    ] ;
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function assistances()
    {
        return $this->hasMany(Assistance::class);
    }
}
