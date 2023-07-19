<?php

namespace App\Http\Livewire\Productores;

use App\Models\Productor;
use Livewire\Component;

class Create extends Component
{

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

    public function render()
    {
        return view('livewire.productores.create');
    }

    public function store(){
        $data = $this->validate();

        Productor::create([
            'RFC' => $data['RFC'],
            'CURP' => $data['CURP'],
            'INE' => $data['INE'],
            'nombre'=> $data['nombre'],
            'apellidos' => $data['apellidos'],
            'domicilio' => $data['domicilio'],
            'telefono' => $data['telefono'],
            'esSocio' => $data['esSocio']
        ]);
        
        session()->flash('message','El productor se registro correctamente');
        
        return redirect()->route('productores.index');
        
    }
}
