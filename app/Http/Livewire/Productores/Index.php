<?php

namespace App\Http\Livewire\Productores;

use App\Models\Productor;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
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
