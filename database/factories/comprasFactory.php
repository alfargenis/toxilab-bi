<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class comprasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = Carbon::now()->startOfYear();
        $end = Carbon::now();

        $createdAt = fake()->dateTimeBetween($start, $end);
        return [
            'factura' => fake()->numberBetween(120, 198),
            'id_proveedor' => fake()->numberBetween(1, 8),
            'id_reactivo' => fake()->numberBetween(1, 78),
            'created_at' => fake()->dateTimeBetween('-3 years', 'now'),
            'updated_at' => fake()->dateTimeBetween('-3 years', 'now'),
        ];
    }
}
