<?php

namespace App\Http\Livewire\Ventas;

use App\Models\Venta;
use Livewire\Component;

class Show extends Component
{

    public $venta;
    public $descuento;
    public $total;
    
    public function mount(Venta $venta){
        $this->venta = $venta;
        if($venta->productor->esSocio){
            $this->descuento = $venta->importe * 0.2;
        }
        $this->total = $venta->importe - $this->descuento;
    }

    public function render()
    {
        return view('livewire.ventas.show');
    }
}
