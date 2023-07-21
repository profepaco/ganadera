<?php

namespace App\Http\Livewire\Productores;

use App\Models\Ganado as GanadoModel;
use Livewire\Component;

class Ganado extends Component
{

    public $productor;

    protected $listeners = ['eliminarGanado'];


    protected function mount($productor){
        $this->productor = $productor;
    }

    public function render()
    {
        return view('livewire.productores.ganado');
    }

    public function eliminarGanado($ganadoId){
        $ganado = GanadoModel::find($ganadoId);
        $productor = $ganado->productor;
        $ganado->delete();
        $this->mount($productor);
        $this->render();
    }
}
