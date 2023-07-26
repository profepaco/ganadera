<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patente extends Model
{
    use HasFactory;

    protected $fillable = [
        'productor_id','foja','libro'
    ];

    public function productor():BelongsTo{
        return $this->belongsTo(Productor::class);
    }

    public function fierros(): HasMany{
        return $this->hasMany(Fierro::class);
    }
}
