<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use Faker\Factory as Faker;
use NunoMaduro\Collision\Adapters\Phpunit\State;

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

        // Obtener una instancia de Faker
        $faker = Faker::create();

        // Definir los estados cercanos a Bolívar
        $estadosCercanos = ['Amazonas', 'Delta Amacuro', 'Anzoátegui', 'Monagas'];

        // Generar una dirección basada en los porcentajes especificados
        $address = $this->generateAddress($estadosCercanos, 63, 21, 16);

        // Obtener una fecha aleatoria dentro de los últimos 15 años
        $createdAt = $faker->dateTimeBetween('-15 years', 'now');

        return [
            'name' => fake()->name,
            'ci' => fake()->nationalId(),
            'address' => $address,
            'old' => fake()->numberBetween(15, 50),
            'gender' => fake()->randomElement(['Masculino', 'Femenino']),
            'status_pemeriksaan' => "Ya comprobado",
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }

    /**
     * Generar una dirección de acuerdo con los porcentajes especificados para los estados.
     *
     * @param array $estadosCercanos
     * @param int $porcentajeBolivar
     * @param int $porcentajeEstadosCercanos
     * @param int $porcentajeOtrosEstados
     * @return string
     */
    private function generateAddress($estadosCercanos, $porcentajeBolivar, $porcentajeEstadosCercanos, $porcentajeOtrosEstados): string
    {
        $randomPercentage = rand(1, 100);

        if ($randomPercentage <= $porcentajeBolivar) {
            return 'Bolívar';
        } elseif ($randomPercentage <= $porcentajeBolivar + $porcentajeEstadosCercanos) {
            return $estadosCercanos[array_rand($estadosCercanos)];
        } else {
                // Generar una dirección aleatoria para otros estados
                $faker = \Faker\Factory::create();
                $allStates = $faker->state();
                $estados = array_diff(['Bolívar','Amazonas', 'Delta Amacuro', 'Anzoátegui', 'Monagas']);
            return $estados[array_rand($estados)];
        }
    }

}
