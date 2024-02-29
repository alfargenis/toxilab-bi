<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class equiposFactory extends Factory
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
            'status' => fake()->numberBetween(1, 100) <= 70 ? 'activo' : 'inactivo',
            't_equipo' => fake()->randomElement([
                'Fluorómetro',
                'Analizador de Secuencia de ADN',
                'Analizador de Hematología',
                'Incubadora de CO2',
                'Espectrómetro de Masas',
                'Microscopio Confocal',
                'Pruebas especiales',
            ]),
            'modelo' => fake()->word,
            'marca' => fake()->randomElement([
                'Medtronic',
                'Johnson & Johnson',
                'Siemens Healthineers',
                'Baxter International',
                'Fresenius Medical Care',
                'Philips Healthcare',
                'GE Healthcare',
                'Becton Dickinson',
                'Stryker',
                'Wiener',
            ]),
            'serial' => fake()->uuid,
            'adquisicion' => fake()->dateTimeBetween('-24 years', 'now')->format('Y-m-d'),
            'precio_adquisicion' => fake()->randomFloat(2, 100, 10000), 
            'vida_util' => fake()->numberBetween(6, 10), 
            'ubicacion' => fake()->randomElement(['toxilab, villa alianza, Puerto Ordaz','toxilab, Av. Atlantico, C.C Atlantico, Puerto Ordaz']),
            'responsable' => fake()->firstName. ' ' . fake()->lastName(),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
