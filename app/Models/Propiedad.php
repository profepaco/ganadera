<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Propiedad extends Model
{
    use HasFactory;

    protected $table = 'propiedades';

    protected $fillable = [
        'productor_id',
        'UPP',
        'lugar',
        'tipo_tenencia',
        'superficie'
    ];

    public function Productor():BelongsTo{
        return $this->belongsTo(Productor::class);
    }
}
