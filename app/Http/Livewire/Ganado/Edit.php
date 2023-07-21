<?php

namespace App\Http\Livewire\Ganado;

use App\Models\Ganado;
use App\Models\Especie;
use Livewire\Component;
use App\Models\Productor;

class Edit extends Component
{

    public $ganado;
    public $ganado_id;
    public $especie_id;
    public $cantidad;

    protected $rules = [
        'especie_id' => 'required',
        'cantidad' => 'required'
    ];

    public function mount( Ganado $ganado){
        $this->ganado = $ganado;
        $this->ganado_id = $ganado->id;
        $this->especie_id = $ganado->especie->id;
        $this->cantidad = $ganado->cantidad;
    }

    public function render()
    {
        $especies = Especie::all();
        return view('livewire.ganado.edit',['especies'=>$especies]);
    }

    public function actualizarGanado(){
        $data = $this->validate();
        $ganado = Ganado::find($this->ganado_id);
        $ganado->especie_id = $data['especie_id'];
        $ganado->cantidad = $data['cantidad'];
        $ganado->save();

        $productor = $ganado->productor;
        session()->flash('message','Los datos del ganado se actualizó correctamente');
        
        return redirect()->route('productores.show',['productore'=>$productor]);
    }
}
