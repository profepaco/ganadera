<?php

namespace App\Http\Livewire\Patentes;

use App\Models\Productor;
use Livewire\Component;

class Index extends Component
{

    public $productor;

    public function mount(Productor $productor){
        $this->productor = $productor;
    }

    public function render()
    {
        return view('livewire.patentes.index');
    }
}
