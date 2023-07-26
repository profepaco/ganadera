<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Productor extends Model
{
    use HasFactory;

    protected $table = 'productores';

    protected $fillable = [ 
        'RFC',
        'CURP',
        'INE',
        'nombre',
        'apellidos',
        'domicilio',
        'telefono',
        'esSocio'
    ];

    public function ganado():HasMany{
        return $this->hasMany(Ganado::class);
    }

    public function propiedades():HasMany{
        return $this->hasMany(Propiedad::class);
    }

    public function patente():HasOne{
        return $this->hasOne(Patente::class);
    }
}
