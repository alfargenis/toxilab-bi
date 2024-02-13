<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class orinasFactory extends Factory
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
            'status' => "ACTIVO",
            'name' => fake()->randomElement(['H','N','M','S']),
            'id_reactivos' => fake()->numberBetween(11, 16),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}