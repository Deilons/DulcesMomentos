<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::factory()->create([
            'email' => 'admin@dulcesmomentos.com',
        ]);
        $admin->assignRole('admin');

        $operario = User::factory()->create([
            'email' => 'operario@dulcesmomentos.com',
        ]);
        $operario->assignRole('operario');

        $cliente = User::factory()->create([
            'email' => 'cliente@dulcesmomentos.com',
        ]);
        $cliente->assignRole('cliente');
    }
}
