<?php

namespace Database\Factories;

use App\Models\Compra;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class comprasFactory extends Factory
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
            'factura' => fake()->unique()->numberBetween(1000, 9999),
            'fecha_compra' => fake()->dateTimeBetween('-3 year', 'now')->format('Ymd'), // Asegúrate de ajustar el formato según cómo almacenas las fechas.
            'precio_unitario' => fake()->randomFloat(2, 10, 500), // Genera un valor decimal entre 10 y 500 con 2 decimales
            'status' => fake()->boolean(), // Genera un valor booleano aleatorio
            'id_proveedor' => fake()->numberBetween(1, 8), // Asume que tienes un ProveedorFactory
            'id_reactivo' => fake()->numberBetween(1, 500), // Asume que tienes un ReactivoFactory
        ];
    }
}
