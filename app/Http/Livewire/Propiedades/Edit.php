<?php

namespace App\Http\Livewire\Propiedades;

use Livewire\Component;
use App\Models\Productor;
use App\Models\Propiedad;

class Edit extends Component
{
    public $productor;
    public $UPP;
    public $lugar;
    public $tipo_tenencia;
    public $superficie;
    public $propiedad_id;

    protected $rules = [
        'UPP' => 'required',
        'lugar' => 'required',
        'tipo_tenencia' => 'required',
        'superficie' => 'required'
    ];


    public function mount(Productor $productore, Propiedad $propiedad){
        $this->productor = $productore;
        $this->propiedad_id = $propiedad->id;
        $this->UPP = $propiedad->UPP;
        $this->lugar = $propiedad->lugar;
        $this->tipo_tenencia = $propiedad->tipo_tenencia;
        $this->superficie = $propiedad->superficie;
    }

    public function render()
    {
        return view('livewire.propiedades.edit');
    }

    public function actualizarPropiedad(){
        $data = $this->validate();
        $propiedad = Propiedad::find($this->propiedad_id);
        $propiedad->UPP = $data['UPP'];
        $propiedad->lugar = $data['lugar'];
        $propiedad->tipo_tenencia = $data['tipo_tenencia'];
        $propiedad->superficie = $data['superficie'];

        $propiedad->save();

        $productor = $propiedad->productor;
        session()->flash('message','Los datos de la propiedad se actualizó correctamente');
        
        return redirect()->route('productores.show',['productore'=>$productor]);
    }
}
