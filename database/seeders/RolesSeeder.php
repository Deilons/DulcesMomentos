<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        Role::firstOrCreate(['name' => 'operario', 'guard_name' => 'web']);

        Role::firstOrCreate(['name' => 'cliente', 'guard_name' => 'cliente']);
    }
}
use App\Models\User;

// $admin = User::create([
//     'name' => 'Admin',
//     'email' => 'admin@example.com',
//     'password' => bcrypt('password'),
// ]);

// $admin->assignRole('admin');
