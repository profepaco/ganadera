<?php

namespace App\Http\Livewire\Ventas;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Productor;

class Create extends Component
{

    protected $listeners = ['agregarCampos','prueba'];

    public $ventaDetalle = array();
    public $importes = array();
    public $subtotal = 0;

    public function render()
    {
        $productores = Productor::all();
        $productos = Producto::all()->setVisible(['nombre']);
        return view('livewire.ventas.create',['productores'=>$productores,'productos'=>$productos]);
    }

    public function agregarCampos($nombreProducto){
        $producto = Producto::where('nombre',$nombreProducto)->first();

        $this->ventaDetalle['id_'.$producto->id] = $producto->id;
    
    }

    public function prueba($productoId,$importe){
        $this->importes['id_'.$productoId] = $importe;
        $this->actualizaSubtotal();
    }
    
    public function actualizaSubtotal(){
        $this->subtotal = 0;
        foreach($this->importes as $k => $v){
            $this->subtotal += $v;
        }
    }
}
