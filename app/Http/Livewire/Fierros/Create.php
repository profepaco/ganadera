<?php

namespace App\Http\Livewire\Fierros;

use App\Models\Fierro;
use App\Models\Patente;
use App\Models\Productor;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $productor;
    public $patente;
    public $imagen;

    protected $rules = [
        'imagen' => 'required|image|max:1024'
    ];

    public function mount(Productor $productore, Patente $patente){
        $this->productor = $productore;
        $this->patente = $patente;
    }

    public function render()
    {
        return view('livewire.fierros.create');
    }

    public function guardarFierro(){
        $data = $this->validate();

        //almacenando la imagen
        $imagen = $this->imagen->store('public/patentes');

        $data['imagen'] = str_replace('public/patentes/','',$imagen);

        $fierro = new Fierro;
        $fierro->patente_id = $this->patente->id;
        $fierro->imagen = $data['imagen'];
        $fierro->save();

        session()->flash('message','El fierro se registro correctamente');
        
        return redirect()->route('patente.show',['productore'=>$this->productor, 'patente'=>$this->patente]);
    }
}
