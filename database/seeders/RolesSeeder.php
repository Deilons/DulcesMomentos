<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $manageClients = Permission::create(['name' => 'manage clients']);
        $manageOrders = Permission::create(['name' => 'manage orders']);

        $adminRole->givePermissionTo([$manageClients, $manageOrders]);
        $userRole->givePermissionTo([$manageOrders]);
    }
}
