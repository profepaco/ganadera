<?php

namespace App\Http\Livewire\Productos;

use Livewire\Component;
use App\Models\Producto;

class Index extends Component
{

    protected $listeners = ['eliminarProducto'];

    public $nombre='';

    public function render()
    {
        $productos = Producto::where('nombre','LIKE','%'.$this->nombre.'%')->paginate(10);
        return view('livewire.productos.index',compact('productos'));
    }

    public function eliminarProducto(Producto $producto){
        $producto->delete();
    }
}
