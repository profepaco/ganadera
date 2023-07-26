<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fierro extends Model
{
    use HasFactory;

    protected $table = 'fierros';

    protected $fillable = ['imagen','patente_id'];

    public function patente(): BelongsTo{
        return $this->belongsTo(Patente::class);
    }
}
