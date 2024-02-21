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
    $faker = Faker::create();
    $start = $faker->dateTimeBetween('-5 years', 'now');
    $end = $faker->dateTimeBetween('-1 years', 'now');

    return [
        'name' => fake()->randomElement(['Perfil Lipídico', 'Perfil Hepático', 'Perfil Renal', 'Hemograma Completo', 'Examen de Orina', 'Glicemia', 'Ácido Úrico', 'Colesterol Total', 'Triglicéridos', 'HDL (Colesterol Bueno)', 'LDL (Colesterol Malo)', 'Hemoglobina Glicosilada (A1C)', 'TSH (Hormona Estimulante de la Tiroides)', 'T4 Libre (Tiroxina Libre)', 'T3 Total (Triyodotironina Total)', 'Ferritina', 'Hierro Sérico', 'Fosfatasa Alcalina', 'Proteína C Reactiva (PCR)', 'Factor Reumatoide', 'Anticuerpos Antinucleares (ANA)', 'Prueba de Embarazo (B-HCG)', 'Examen de Papanicolaou (PAP)', 'Cultivo de Orina', 'Test de VIH', 'Sedimento Urinario', 'Electrolitos', 'Gasometría Arterial', 'Panel de Enzimas Cardíacas', 'Coagulación (Tiempo de Protrombina, Tiempo de Tromboplastina Parcial Activado, etc.)']),
        'precio'=>  fake()->numberBetween(1, 10),
        'id_cliente' => fake()->numberBetween(1, 230),
        'created_at' => $start,
        'updated_at' => $end,
    ];
}
}
