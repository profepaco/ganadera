<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ganado extends Model
{
    use HasFactory;

    protected $table = 'ganados';

    protected $fillable = ['productor_id','especie_id','cantidad'];

    public function Productor():BelongsTo{
        return $this->belongsTo(Productor::class);
    }

    public function Especie():BelongsTo{
        return $this->belongsTo(Especie::class);
    }
}
