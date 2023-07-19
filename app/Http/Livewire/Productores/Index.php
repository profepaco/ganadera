<?php

namespace App\Http\Livewire\Productores;

use App\Models\Productor;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = ['eliminarProductor'];

    public function render()
    {
        $productores = Productor::paginate(10);
        return view('livewire.productores.index',['productores'=>$productores]);
    }

    public function eliminarProductor(Productor $productor){
        $productor->delete();
    }
}
