<?php

namespace App\Http\Livewire\Ganado;

use App\Models\Especie;
use App\Models\Ganado;
use App\Models\Productor;
use Livewire\Component;

class Create extends Component
{

    public $productor;
    public $especie_id;
    public $cantidad;

    protected $rules = [
        'especie_id' => 'required',
        'cantidad' => 'required'
    ];


    public function mount(Productor $productore){
        $this->productor = $productore;
    }

    public function render()
    {
        $especies = Especie::all();
        return view('livewire.ganado.create',['especies'=>$especies]);
    }

    public function guardarGanado(){
        $data = $this->validate();

        Ganado::create([
            'productor_id'=>$this->productor->id,
            'especie_id'=>$data['especie_id'],
            'cantidad'=>$data['cantidad']
        ]);

        session()->flash('message','El ganado se registro correctamente');
        return redirect()->route('productores.show',['productore'=>$this->productor]);
    }
}
