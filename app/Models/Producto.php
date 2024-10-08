<?php

namespace App\Models;

use App\Models\Precio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['clave','nombre','descripcion','cantidad','categoria_id'];

    public function Categoria():BelongsTo{
        return $this->belongsTo(Categoria::class);
    }

    public function precios():HasMany{
        return $this->hasMany(Precio::class);
    }

    public function ultimoPrecio(){
        return $this->precios->where('es_ultimo',1)->first();
    }

    public function ventas():BelongsToMany{
        return $this->belongsToMany(Venta::class);
    }
}
