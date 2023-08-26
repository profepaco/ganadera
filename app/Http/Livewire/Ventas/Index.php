<?php

namespace App\Http\Livewire\Ventas;

use App\Models\Venta;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public function render()
    {
        $user = auth()->user();
        if($user->hasRole('Administrador')){
            $ventas = Venta::orderBy('id','desc')->paginate(10);
        }else{
            $ventas = Venta::where('user_id',$user->id)->orderBy('id','desc')->paginate(10);
        }
        return view('livewire.ventas.index',['ventas'=>$ventas]);
    }
}
