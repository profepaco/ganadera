<?php

namespace App\Http\Livewire\Productos;

use App\Models\Producto;
use Livewire\Component;

class Entrada extends Component
{

    public $listeners = ['agregarCampos'];

    public $productos;
    public $entradaDetalle = Array();

    public function mount(){
        $this->productos = Producto::all();
    }

    public function render()
    {
        return view('livewire.productos.entrada');
    }

    public function agregarCampos($nombreProducto){
        $producto = Producto::where('nombre',$nombreProducto)->first();
        $this->entradaDetalle[$producto->id] = $producto->id;
    
    }
}
