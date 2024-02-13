<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class proveedoresFactory extends Factory
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
            'name' => fake()->name,
            'email' => fake()->unique()->email,
            'empresa' => fake()->randomElement(['DISMELAB', 'SIEMENS', 'REACTILAB']),
            'phone' => fake()->phoneNumber(),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
