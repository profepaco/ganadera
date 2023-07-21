<?php

namespace App\Http\Livewire\Ganado;

use Livewire\Component;
use App\Models\Ganado;

class Index extends Component
{
    public $productor;

    protected $listeners = ['eliminarGanado'];


    protected function mount($productor){
        $this->productor = $productor;
    }

    public function render()
    {
        return view('livewire.ganado.index');
    }

    public function eliminarGanado($ganadoId){
        $ganado = Ganado::find($ganadoId);
        $productor = $ganado->productor;
        $ganado->delete();
        $this->mount($productor);
        $this->render();
    }
}
