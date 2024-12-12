<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;
use Spatie\Permission\Models\Role;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Cliente::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'preferencias' => $this->faker->sentence,
        ];
        $cliente->assignRole('cliente', 'cliente');
    }
    // public function configure()
    // {
    //     return $this->afterCreating(function (Cliente $cliente) {
    //         $role = Role::findOrCreate('cliente');

    //         $cliente->assignRole($role);
    //     });
    // }
}
