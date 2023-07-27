<?php

namespace App\Http\Livewire\Productos;

use App\Models\Producto;
use Livewire\Component;

class Show extends Component
{

    public $producto;

    public function mount(Producto $producto){
        $this->producto = $producto;
    }

    public function render()
    {
        return view('livewire.productos.show');
    }
}
