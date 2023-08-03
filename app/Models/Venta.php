<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','productor_id'];

    public function productos():BelongsToMany{
        return $this->belongsToMany(Producto::class);
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function propietario():BelongsTo{
        return $this->belongsTo(Propietario::class);
    }
}
