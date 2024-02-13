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
        // $start = Carbon::now()->startOfYear();
        // $end = Carbon::now();

        // $createdAt = fake()->dateTimeBetween($start, $end);
        // Obtener la fecha actual y restar 15 años
        $startDate = Carbon::now()->subYears(15);

        // Obtener la fecha actual
        $endDate = Carbon::now();

        // Generar una fecha aleatoria dentro del rango de 15 años
        $createdAt = $this->faker->dateTimeBetween($startDate, $endDate);
        return [
            'name' => fake()->name,
            'address' => fake()->address,
            'old' => fake()->numberBetween(15, 50),
            'gender' => fake()->randomElement(['Masculino', 'Femenino']),
            'status_pemeriksaan' => "Ya comprobado",
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
