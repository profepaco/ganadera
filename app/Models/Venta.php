<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','productor_id','importe'];

    public function productos():BelongsToMany{
        return $this->belongsToMany(Producto::class)->withPivot(['cantidad','precio'])->withTimestamps();
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function productor():BelongsTo{
        return $this->belongsTo(Productor::class);
    }
}
