<?php

namespace App\Http\Livewire\Propiedades;

use Livewire\Component;
use App\Models\Propiedad;

class Index extends Component
{
    public $productor;

    protected $listeners = ['eliminarPropiedad'];


    protected function mount($productor){
        $this->productor = $productor;
    }

    public function render()
    {
        return view('livewire.propiedades.index');
    }

    public function eliminarPropiedad($propiedadId){
        $propiedad = Propiedad::find($propiedadId);
        $productor = $propiedad->productor;
        $propiedad->delete();
        $this->mount($productor);
        $this->render();
    }
}
