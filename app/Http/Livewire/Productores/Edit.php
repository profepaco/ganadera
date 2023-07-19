<?php

namespace App\Http\Livewire\Productores;

use App\Models\Productor;
use Livewire\Component;

class Edit extends Component
{
    public $productor_id;
    public $RFC;
    public $CURP;
    public $INE;
    public $nombre;
    public $apellidos;
    public $domicilio;
    public $telefono;
    public $esSocio;

    protected $rules = [
        'RFC' => 'required',
        'CURP' => 'required',
        'INE' => 'required',
        'nombre'=> 'required',
        'apellidos' => 'required',
        'domicilio' => 'required',
        'telefono' => 'required',
        'esSocio' => 'required'
    ];

    public function mount(Productor $productor){
        $this->productor_id = $productor->id;
        $this->RFC = $productor->RFC;
        $this->CURP = $productor->CURP;
        $this->INE = $productor->INE;
        $this->nombre = $productor->nombre;
        $this->apellidos = $productor->apellidos;
        $this->domicilio = $productor->domicilio;
        $this->telefono = $productor->telefono; 
        $this->esSocio = $productor->esSocio;
    }

    public function render()
    {
        return view('livewire.productores.edit');
    }

    public function update(){
        $data = $this->validate();

        $productor = Productor::find($this->productor_id);

        $productor->RFC = $data['RFC'];
        $productor->CURP = $data['CURP'];
        $productor->INE = $data['INE'];
        $productor->nombre = $data['nombre'];
        $productor->apellidos = $data['apellidos'];
        $productor->domicilio = $data['domicilio'];
        $productor->telefono = $data['telefono'];
        $productor->esSocio = $data['esSocio'];

        $productor->save();

        session()->flash('message','El productor se actualizó correctamente');
        
        return redirect()->route('productores.index');
    }
}
