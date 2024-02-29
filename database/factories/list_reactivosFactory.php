<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class list_reactivosFactory extends Factory
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
            'id_equipo' => \App\Models\equipos::factory(),
            'id_reactivos' => \App\Models\reactivos::factory(), 
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
