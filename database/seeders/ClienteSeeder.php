<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use Spatie\Permission\Models\Role;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        $role = Role::findByName('cliente', 'cliente');  

    Cliente::factory(10)->create()->each(function ($cliente) use ($role) {
        $cliente->assignRole($role);
    });

    }
}
