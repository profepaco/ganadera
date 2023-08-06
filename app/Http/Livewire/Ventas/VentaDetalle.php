<?php

namespace App\Http\Livewire\Ventas;

use App\Models\Producto;
use Livewire\Component;

class VentaDetalle extends Component
{
    public $producto_id;
    public $producto_clave;
    public $producto_nombre;
    public $producto_precio;
    public $cantidad;
    public $importe;



    public function mount($producto){
        $producto = Producto::find($producto);
        $this->producto_id = $producto->id;
        $this->producto_clave = $producto->clave;
        $this->producto_nombre = $producto->nombre;
        $this->producto_precio = $producto->ultimoPrecio()->valor;
        $this->cantidad = 0;
        $this->actualizarImporte();
    }

    public function render()
    {
        return view('livewire.ventas.venta-detalle');
    }

    public function aumentarCantidad(){
        $this->cantidad++;
        $this->actualizarImporte();
    }
    public function disminuirCantidad(){
        if($this->cantidad>1){
            $this->cantidad--;
            $this->actualizarImporte();
            
        }
    }

    public function actualizarImporte(){
        $this->importe = $this->producto_precio * $this->cantidad;
        $this->emit('agregaImporte',$this->producto_id,$this->importe,$this->cantidad,$this->producto_precio);
    }

    public function eliminarCampo($producto_id){
        $this->emit('quitarElemento',$producto_id);
    }

}
