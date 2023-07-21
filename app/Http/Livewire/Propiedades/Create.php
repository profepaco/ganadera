<?php

namespace App\Http\Livewire\Propiedades;

use Livewire\Component;
use App\Models\Productor;
use App\Models\Propiedad;

class Create extends Component
{

    public $productor;
    public $UPP;
    public $lugar;
    public $tipo_tenencia;
    public $superficie;

    protected $rules = [
        'UPP' => 'required',
        'lugar' => 'required',
        'tipo_tenencia' => 'required',
        'superficie' => 'required'
    ];

    public function mount(Productor $productore)
    {
        $this->productor = $productore;
    }
    public function render()
    {
        return view('livewire.propiedades.create');
    }

    public function guardarPropiedad()
    {
        $data = $this->validate();

        Propiedad::create([
            'UPP' => $data['UPP'],
            'lugar' => $data['lugar'],
            'tipo_tenencia' => $data['tipo_tenencia'],
            'superficie' => $data['superficie'],
            'productor_id'=>$this->productor->id
        ]);

        session()->flash('message','La propiedad se registró correctamente');
        return redirect()->route('productores.show',['productore'=>$this->productor]);
    }
}
