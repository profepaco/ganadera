<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

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
