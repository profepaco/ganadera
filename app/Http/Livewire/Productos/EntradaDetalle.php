<?php

namespace App\Http\Livewire\Productos;

use Livewire\Component;
use App\Models\Producto;

class EntradaDetalle extends Component
{

    public $producto_id;
    public $producto_clave;
    public $producto_nombre;
    public $cantidad;

    public function mount($producto){
        $producto = Producto::find($producto);
        $this->producto_id = $producto->id;
        $this->producto_clave = $producto->clave;
        $this->producto_nombre = $producto->nombre;
        $this->cantidad = 1;
    }

    public function render()
    {
        return view('livewire.productos.entrada-detalle');
    }

    public function aumentarCantidad(){
        $this->cantidad++;
        $this->emit('actualizaCantidad',$this->producto_id, $this->cantidad);
    }
    public function disminuirCantidad(){
        if($this->cantidad>1){
            $this->cantidad--;
        }
        $this->emit('actualizaCantidad',$this->producto_id, $this->cantidad);
    }

    

    public function eliminarCampo($producto_id){
        $this->emit('quitarElemento',$producto_id);
    }
}
