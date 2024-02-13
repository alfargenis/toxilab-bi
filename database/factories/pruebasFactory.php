<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use Faker\Factory as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class pruebasFactory extends Factory
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
        'name' => fake()->unique()->randomElement(['COCAINA','ANTIGENO PROSTACTICO', 'HIV', 'MARIHUANA','COLESTEROLl','TRIGRICERIDOS','HEMATOLOGIA','CREATININA','DENGUE','TSH','T4','T3','BILIRUBINA','CALCIO','HIERRO','UREA']),
        'precio'=>  fake()->numberBetween(1, 10),
        'id_cliente' => fake()->numberBetween(1, 20),
        'created_at' => $start,
        'updated_at' => $end,
    ];
}
}
