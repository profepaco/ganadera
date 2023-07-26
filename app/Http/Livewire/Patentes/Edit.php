<?php

namespace App\Http\Livewire\Patentes;

use App\Models\Fierro;
use App\Models\Patente;
use Livewire\Component;
use App\Models\Productor;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $productor;
    public $patente_id;
    public $libro;
    public $foja;
    public $fierro_id;

    public $imagen;
    public $nueva_imagen;

    protected $rules = [
        'libro' => 'required',
        'foja' => 'required',
        'nueva_imagen' => 'nullable|image|max:1024'
    ];

    public function mount(Productor $productore,Patente $patente){
        $this->productor = $productore;
        $this->patente_id = $patente->id;
        $this->libro = $patente->libro;
        $this->foja = $patente->foja;
        $this->fierro_id = $patente->fierros[0]->id;
        $this->imagen = $patente->fierros[0]->imagen;
    }
    
    public function render()
    {
        return view('livewire.patentes.edit');
    }

    public function actualizarPatente(){
        $data = $this->validate();

        if($this->nueva_imagen){
            $imagen = $this->nueva_imagen->store('public/patentes');
            $data['imagen'] = str_replace('public/patentes/','',$imagen);
        }
        //Actualizando la patente
        $patente = Patente::find($this->patente_id);
        $patente->productor_id = $this->productor->id;
        $patente->libro = $data['libro'];
        $patente->foja = $data['foja'];
        $patente->save();

        //Actualizando el fierro
        $fierro = Fierro::find($this->fierro_id);
        $fierro->imagen = $data['imagen'] ?? $fierro->imagen;
        $fierro->save();

        session()->flash('message','La patente se actualizó correctamente');

        return redirect()->route('productores.show',['productore'=>$this->productor]);
    }
}
