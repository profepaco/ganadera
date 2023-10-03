<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->name = 'Administrador';
        $user->email = 'admin@mail.com';
        $user->password = bcrypt('password');

        $user->save();

        $role = Role::find(1);
        
        $user->assignRole($role);

    }
}
