<?php

namespace App\Http\Livewire\Ventas;

use App\Models\Venta;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $ventas = Venta::paginate(10);
        return view('livewire.ventas.index',['ventas'=>$ventas]);
    }
}
