<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
