<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{

    public $user_id;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;

    public function mount(User $user){
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        if(count($user->roles)>0){
            $this->role = $user->roles[0]->id;
        }
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.users.edit',['roles'=>$roles]);
    }

    public function update(){
        $data = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user_id,
            'password' => 'same:password_confirmation',
            'role' => 'required'
        ]);

        $user = User::find($this->user_id);

        $user->name = $data['name'];
        $user->email = $data['email'];
        if($data['password']){
            $user->password = Hash::make($data['password']);
        }
        $user->syncRoles($data['role']);
        $user->save();
        
        session()->flash('message','El usuario se actualizó correctamente');

        return redirect()->route('usuarios.index');
    }
}
