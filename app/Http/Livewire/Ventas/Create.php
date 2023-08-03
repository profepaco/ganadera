<?php

namespace App\Http\Livewire\Ventas;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Productor;

class Create extends Component
{

    protected $listeners = ['agregarCampos','prueba','quitarElemento'];

    public $ventaDetalle = array();
    public $productorId;
    public $productor;
    public $importes = array();
    public $subTotal = 0;
    public $descuentoSocio = 0;
    public $total = 0;

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

    public function buscaProductor(){
        $this->productor = Productor::find($this->productorId);
        $this->actualizaSubtotal();
    }

    public function prueba($productoId,$importe){
        $this->importes['id_'.$productoId] = $importe;
        $this->actualizaSubtotal();
    }
    
    public function actualizaSubtotal(){
        $this->subTotal = 0;
        $this->descuentoSocio = 0;
        foreach($this->importes as $k => $v){
            $this->subTotal += $v;
        }
        if($this->productor && $this->productor->esSocio){
            $this->descuentoSocio = $this->subTotal * 0.20;
        }
        $this->total = $this->subTotal - $this->descuentoSocio;
    }

    public function quitarElemento($productoId){
        unset($this->ventaDetalle['id_'.$productoId]);
        unset($this->importes['id_'.$productoId]);
        $this->actualizaSubtotal();
    }
}
