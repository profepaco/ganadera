<?php

namespace App\Http\Livewire\Productores;

use Livewire\Component;
use App\Models\Propiedad;

class Propiedades extends Component
{
    public $productor;

    protected $listeners = ['eliminarPropiedad'];


    protected function mount($productor){
        $this->productor = $productor;
    }

    public function render()
    {
        return view('livewire.productores.propiedades');
    }

    public function eliminarPropiedad($propiedadId){
        $propiedad = Propiedad::find($propiedadId);
        $productor = $propiedad->productor;
        $propiedad->delete();
        $this->mount($productor);
        $this->render();
    }
}
