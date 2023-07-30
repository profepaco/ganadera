<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:password_confirmation',
        'role' => 'required'
    ];

    public function render()
    {
        $roles = Role::all();
        return view('livewire.users.create',['roles'=>$roles]);
    }

    public function store(){
        $data = $this->validate($this->rules);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole($data['role']);
        
        session()->flash('message','El usuario se creo correctamente');

        return redirect()->route('usuarios.index');
    }
}
