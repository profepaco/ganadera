<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Precio extends Model
{
    use HasFactory;

    protected $fillable = ['valor','es_ultimo','producto_id'];

    public function Categoria():BelongsTo{
        return $this->belongsTo(Producto::class);
    }
}
