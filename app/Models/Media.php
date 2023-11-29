<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        "assistance_id",
        "type",
        "path",
    ];

    public function assistance()
    {
        return $this->belongsTo(Assistance::class);
    }

}
