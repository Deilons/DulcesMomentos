<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        Permission::create(['name' => 'ver pedidos']);
        Permission::create(['name' => 'crear pedidos']);
        Permission::create(['name' => 'eliminar pedidos']);

        // Asignar permisos a los roles
        $admin = Role::findByName('admin');
        $admin->givePermissionTo(['ver pedidos', 'crear pedidos', 'eliminar pedidos']);

        $operario = Role::findByName('operario');
        $operario->givePermissionTo(['ver pedidos', 'crear pedidos']);

        $cliente = Role::findByName('cliente');
        $cliente->givePermissionTo('crear pedidos');
    }
}
