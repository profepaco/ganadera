<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = ['eliminarUsuario'];

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.users.index',['users'=>$users]);
    }

    public function eliminarUsuario(User $user){
        $user->delete();
    }
}
