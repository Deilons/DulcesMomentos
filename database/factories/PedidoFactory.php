<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pedido;
use App\Models\Cliente;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pedido::class;

    public function definition()
    {
        return [
            'cliente_id' => Cliente::factory(),
            'detalles' => $this->faker->sentence,
            'estado' => $this->faker->randomElement(['pendiente', 'completado']),
            'prioridad' => $this->faker->randomDigitNotNull,
            'fecha_entrega' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
