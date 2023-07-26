<?php

namespace App\Http\Livewire\Patentes;

use App\Models\Fierro;
use App\Models\Patente;
use Livewire\Component;
use App\Models\Productor;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $productor;
    public $libro;
    public $foja;
    public $imagen;

    protected $rules = [
        'libro' => 'required',
        'foja' => 'required',
        'imagen' => 'required|image|max:1024'
    ];

    public function mount(Productor $productore){
        $this->productor = $productore;
    }

    public function render()
    {
        return view('livewire.patentes.create');
    }

    public function guardarPatente(){
        $data = $this->validate();

        //almacenando la imagen
        $imagen = $this->imagen->store('public/patentes');

        $data['imagen'] = str_replace('public/patentes/','',$imagen);

        //Guardando la patente
        $patente = new Patente;
        $patente->productor_id = $this->productor->id;
        $patente->libro = $data['libro'];
        $patente->foja = $data['foja'];
        $patente->save();

        //Guardando el fierro
        $fierro = new Fierro;
        $fierro->patente_id = $patente->id;
        $fierro->imagen = $data['imagen'];
        $fierro->save();

        session()->flash('message','La patente se registro correctamente');

        return redirect()->route('productores.show',['productore'=>$this->productor]);
    }
}
