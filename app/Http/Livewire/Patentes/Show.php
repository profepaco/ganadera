<?php

namespace App\Http\Livewire\Patentes;

use App\Models\Fierro;
use App\Models\Patente;
use Livewire\Component;
use App\Models\Productor;
use Illuminate\Support\Facades\Storage;

class Show extends Component
{

    public $productor;
    public $patente;

    protected $listeners = ['eliminarFierro'];

    public function mount(Productor $productore, Patente $patente){
        $this->productor = $productore;
        $this->patente = $patente;
    }

    public function render()
    {
        return view('livewire.patentes.show');
    }

    public function eliminarFierro($fierroId){

        $productor = Productor::find($this->productor->id);
        $patente = $productor->patente;

        $fierro = Fierro::find($fierroId);
        $imagen = 'public/patentes/'.$fierro->imagen;
        
        $fierro->delete();
        Storage::delete($imagen);

        $this->mount($productor, $patente);
        $this->render(); 

    }
}
