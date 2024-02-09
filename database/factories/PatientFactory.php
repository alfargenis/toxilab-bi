<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use Faker\Factory as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    $start = now()->startOfYear();
    $end = now();


    return [
        'name' => fake()->name,
        'address' => fake()->address,
        'old' => fake()->numberBetween(15, 50),
        'gender' => fake()->randomElement(['Masculino', 'Femenino']),
        'status_pemeriksaan' => "Ya comprobado",
        'created_at' => $start,
        'updated_at' => $end,
    ];
}
}
