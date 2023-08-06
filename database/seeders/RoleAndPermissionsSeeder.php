<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create productor']);
        Permission::create(['name' => 'view productor']);
        Permission::create(['name' => 'edit productor']);
        Permission::create(['name' => 'update productor']);
        Permission::create(['name' => 'delete productor']);

        Permission::create(['name' => 'create ganado']);
        Permission::create(['name' => 'view ganado']);
        Permission::create(['name' => 'edit ganado']);
        Permission::create(['name' => 'update ganado']);
        Permission::create(['name' => 'delete ganado']);

        Permission::create(['name' => 'create patentes']);
        Permission::create(['name' => 'view patentes']);
        Permission::create(['name' => 'edit patentes']);
        Permission::create(['name' => 'update patentes']);
        Permission::create(['name' => 'delete patentes']);

        Permission::create(['name' => 'create fierros']);
        Permission::create(['name' => 'view fierros']);
        Permission::create(['name' => 'edit fierros']);
        Permission::create(['name' => 'update fierros']);
        Permission::create(['name' => 'delete fierros']);

        Permission::create(['name' => 'create propiedad']);
        Permission::create(['name' => 'view propiedad']);
        Permission::create(['name' => 'edit propiedad']);
        Permission::create(['name' => 'update propiedad']);
        Permission::create(['name' => 'delete propiedad']);

        Permission::create(['name' => 'create productos']);
        Permission::create(['name' => 'view productos']);
        Permission::create(['name' => 'edit productos']);
        Permission::create(['name' => 'update productos']);
        Permission::create(['name' => 'delete productos']);
        
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name'=>'view ventas']);
        Permission::create(['name'=>'create ventas']);
        Permission::create(['name'=>'cancel ventas']);

        //Asignando roles
        $admin = Role::create(['name' => 'Administrador']);
        $admin->givePermissionTo(Permission::all());
        
        //Vendedor
        $vendedor = Role::create(['name' => 'Vendedor']);
        $vendedor->givePermissionTo('create ventas');
        $vendedor->givePermissionTo('view ventas');
        $vendedor->givePermissionTo('cancel ventas');

        //Encargada de productores
        $role = Role::create(['name' => 'Encargada de productores']);
        $role->givePermissionTo('create productor');
        $role->givePermissionTo('view productor');
        $role->givePermissionTo('edit productor');
        $role->givePermissionTo('update productor');
        $role->givePermissionTo('delete productor');

        $role->givePermissionTo('create ganado');
        $role->givePermissionTo('view ganado');
        $role->givePermissionTo('edit ganado');
        $role->givePermissionTo('update ganado');
        $role->givePermissionTo('delete ganado');

        $role->givePermissionTo('create patentes');
        $role->givePermissionTo('view patentes');
        $role->givePermissionTo('edit patentes');
        $role->givePermissionTo('update patentes');
        $role->givePermissionTo('delete patentes');

        $role->givePermissionTo('create fierros');
        $role->givePermissionTo('view fierros');
        $role->givePermissionTo('edit fierros');
        $role->givePermissionTo('update fierros');
        $role->givePermissionTo('delete fierros');

        $role->givePermissionTo('create propiedad');
        $role->givePermissionTo('view propiedad');
        $role->givePermissionTo('edit propiedad');
        $role->givePermissionTo('update propiedad');
        $role->givePermissionTo('delete propiedad');

    }
}
