<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class especialesFactory extends Factory
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
            'name' => fake()->randomElement(['A','B','C','D']),
            'id_reactivos' => fake()->numberBetween(7, 11),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
