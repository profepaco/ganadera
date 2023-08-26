<?php

namespace App\Http\Livewire\Patentes;

use App\Models\Patente;
use Livewire\Component;
use Livewire\WithPagination;

class ListaPatentes extends Component
{
    use WithPagination;
    public function render()
    {
        $patentes = Patente::orderBy('id','desc')->paginate(10);
        return view('livewire.patentes.lista-patentes',['patentes'=>$patentes]);
    }
}
