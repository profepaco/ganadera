<?php

namespace App\Http\Livewire\Productores;

use App\Models\Ganado;
use Livewire\Component;

class Show extends Component
{

    public $productor;

    protected function mount($productor)
    {
        $this->productor = $productor;
    }

    public function render()
    {
        return view('livewire.productores.show');
    }

}
