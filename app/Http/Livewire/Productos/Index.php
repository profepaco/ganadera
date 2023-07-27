<?php

namespace App\Http\Livewire\Productos;

use Livewire\Component;
use App\Models\Producto;

class Index extends Component
{

    protected $listeners = ['eliminarProducto'];

    public function render()
    {
        $productos = Producto::paginate(10);
        return view('livewire.productos.index',['productos'=>$productos]);
    }

    public function eliminarProducto(Producto $producto){
        $producto->delete();
    }
}
