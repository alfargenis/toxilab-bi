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
            'name' => fake()->randomElement(['COCAINA','ANTIGENO PROSTACTICO', 'HIV', 'MARIHUANA','COLESTEROLl','TRIGRICERIDOS','HEMATOLOGIA','CREATININA','DENGUE','TSH','T4','T3','BILIRUBINA','CALCIO','HIERRO','UREA']),
            'marca' => fake()->randomElement(['SIEMEMS', 'WIENER', 'JOMPSOM']),
            'precio' => fake()->numberBetween(10, 25),
            'id_prueba' => \App\Models\pruebas::factory(),
            'created_at' => fake()->dateTimeBetween('-3 years', 'now'),
            'updated_at' => fake()->dateTimeBetween('-3 years', 'now'),
        ];
    }
}
