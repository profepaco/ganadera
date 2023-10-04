<?php

namespace App\Http\Livewire\Productores;

use App\Models\Productor;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $listeners = ['eliminarProductor'];
    public $rfc="";
    public $busqueda;

    public function render()
    {
        $productores = Productor::where('RFC','LIKE','%'.$this->rfc.'%')->paginate(10);
        return view('livewire.productores.index',compact('productores'));
    }

    public function eliminarProductor(Productor $productor){
        $productor->delete();
    }
}
