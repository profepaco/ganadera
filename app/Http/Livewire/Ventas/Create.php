<?php

namespace App\Http\Livewire\Ventas;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Productor;
use App\Models\Venta;

class Create extends Component
{

    protected $listeners = ['agregarCampos','agregaImporte','quitarElemento'];

    public $ventaDetalle = array();
    public $productorId;
    public $productor;
    public $importes = array();
    public $subTotal = 0;
    public $descuentoSocio = 0;
    public $total = 0;

    protected $rules = [
        'productorId'=>'required',
    ];

    public function render()
    {
        $productores = Productor::all();
        $productos = Producto::all()->setVisible(['nombre']);
        return view('livewire.ventas.create',['productores'=>$productores,'productos'=>$productos]);
    }

    public function agregarCampos($nombreProducto){
        $producto = Producto::where('nombre',$nombreProducto)->first();
        $this->ventaDetalle[$producto->id] = $producto->id;
    
    }

    public function buscaProductor(){
        $this->productor = Productor::find($this->productorId);
        $this->actualizaSubtotal();
    }

    public function agregaImporte($productoId,$importe, $cantidad, $precio){
        $this->importes[$productoId] = ['importe'=>$importe,'cantidad'=>$cantidad,'precio'=>$precio];
        $this->actualizaSubtotal();
    }
    
    public function actualizaSubtotal(){
        $this->subTotal = 0;
        $this->descuentoSocio = 0;
        foreach($this->importes as $k => $v){
            $this->subTotal += $v['importe'];
        }
        if($this->productor && $this->productor->esSocio){
            $this->descuentoSocio = $this->subTotal * 0.20;
        }
        $this->total = $this->subTotal - $this->descuentoSocio;
    }

    public function quitarElemento($productoId){
        unset($this->ventaDetalle[$productoId]);
        unset($this->importes[$productoId]);
        $this->actualizaSubtotal();
    }

    public function store(){
        $this->validate();

        $venta = new Venta;
        $venta->user_id = auth()->user()->id;
        $venta->productor_id = $this->productorId;
        $venta->importe = $this->subTotal;

        $venta->save();

        foreach($this->importes as $producto_id => $v){
            $venta->productos()->attach(['producto_id'=>$producto_id],['cantidad'=>$v['cantidad'],'precio'=>$v['precio']]);
        }
        
        session()->flash('message','La venta se realizó correctamente');
        return redirect()->route('ventas.index');
    }
}
