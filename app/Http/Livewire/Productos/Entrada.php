<?php

namespace App\Http\Livewire\Productos;

use App\Models\Producto;
use Livewire\Component;

class Entrada extends Component
{

    public $listeners = ['agregarCampos','quitarElemento','actualizaCantidad'];

    public $productos;
    public $entradaDetalle = Array();
    public $cantidades = Array();
    public $total = 0;

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
        $this->total += 1;
    }

    public function quitarElemento($productoId){
        unset($this->entradaDetalle[$productoId]);
        unset($this->cantidades[$productoId]);
        $this->sumarTotal();
    }

    public function actualizaCantidad($productoID, $cantidad){
        $this->cantidades[$productoID] = ['cantidad'=>$cantidad];
        $this->sumarTotal();
    }

    private function sumarTotal(){
        $this->total = 0;
        foreach($this->cantidades as $producto_id => $value){
            $this->total += $value['cantidad'];
        }
    }
    public function store(){
        foreach($this->cantidades as $producto_id => $value){
            $producto = Producto::find($producto_id);
            $producto->cantidad = $producto->cantidad + $value['cantidad'];
            $producto->save();
        }
        session()->flash('message','La entrada de productos se realizó correctamente');
        return redirect()->route('productos.index');
    }
}
