<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class reactivosFactory extends Factory
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
            // 'name' => fake()->name('antigeno','hiv','marihuana'),
            'name' => fake()->randomElement(['antigeno', 'hiv', 'marihuana']),
            // 'marca' => fake()->marca('siemens','wiener','prueba'),
            'marca' => fake()->randomElement(['siemens', 'wiener', 'prueba']),
            'data' => fake()->numberBetween(2018, 2023),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
