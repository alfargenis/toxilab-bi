<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Application;
use App\Models\User;
use App\Models\Patient;
use App\Models\proveedores;
use App\Models\pruebas;
use App\Models\especiales;
use App\Models\QueueNumber;
use App\Models\reactivos;
use App\Models\orinas;
use App\Models\hemas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Application::create([
            'name_app' => 'BIP-LAB',
            'description_app' => 'Power BI para Toxi-Lab',
            'open_days' => '1',
            'close_days' => "5",
            'open_time' => '18:15',
            'close_time' => '21:00',
            'address' => 'Puerto Ordaz, Estado Bolivar, Venezuela'
        ]);

        Patient::factory(1250)->create();
        proveedores::factory(3)->create();
        pruebas::factory(16)->create();
        reactivos::factory(16)->create();
        especiales::factory(4)->create();
        hemas::factory(4)->create();
        orinas::factory(4)->create();
        
        

        Patient::create([
            'name' => fake()->name,
            'Address' => fake()->address,
            'old' => fake()->numberBetween(15, 50),
            'gender' => fake()->randomElement(['Masculino', 'Femenino']),
            'queue_number_id' => 10
        ]);

        Patient::create([
            'name' => fake()->name,
            'Address' => fake()->address,
            'old' => fake()->numberBetween(15, 50),
            'gender' => fake()->randomElement(['Masculino', 'Femenino']),
            'queue_number_id' => 9
        ]);

        Patient::create([
            'name' => fake()->name,
            'Address' => fake()->address,
            'old' => fake()->numberBetween(15, 50),
            'gender' => fake()->randomElement(['Masculino', 'Femenino']),
            'queue_number_id' => 8
        ]);

        Patient::create([
            'name' => fake()->name,
            'Address' => fake()->address,
            'old' => fake()->numberBetween(15, 50),
            'gender' => fake()->randomElement(['Masculino', 'Femenino']),
            'queue_number_id' => 7
        ]);

        Patient::create([
            'name' => fake()->name,
            'Address' => fake()->address,
            'old' => fake()->numberBetween(15, 50),
            'gender' => fake()->randomElement(['Masculino', 'Femenino']),
            'queue_number_id' => 6
        ]);

        Patient::create([
            'name' => fake()->name,
            'Address' => fake()->address,
            'old' => fake()->numberBetween(15, 50),
            'gender' => fake()->randomElement(['Masculino', 'Femenino']),
            'queue_number_id' => 5
        ]);

        Patient::create([
            'name' => fake()->name,
            'Address' => fake()->address,
            'old' => fake()->numberBetween(15, 50),
            'gender' => fake()->randomElement(['Masculino', 'Femenino']),
            'queue_number_id' => 4
        ]);

        Patient::create([
            'name' => fake()->name,
            'Address' => fake()->address,
            'old' => fake()->numberBetween(15, 50),
            'gender' => fake()->randomElement(['Masculino', 'Femenino']),
            'queue_number_id' => 3
        ]);

        Patient::create([
            'name' => fake()->name,
            'Address' => fake()->address,
            'old' => fake()->numberBetween(15, 50),
            'gender' => fake()->randomElement(['Masculino', 'Femenino']),
            'queue_number_id' => 2
        ]);

        Patient::create([
            'name' => fake()->name,
            'Address' => fake()->address,
            'old' => fake()->numberBetween(15, 50),
            'gender' => fake()->randomElement(['Masculino', 'Femenino']),
            'queue_number_id' => 1
        ]);

        QueueNumber::create([
            'number' => 1
        ]);
        QueueNumber::create([
            'number' => 2
        ]);
        QueueNumber::create([
            'number' => 3
        ]);
        QueueNumber::create([
            'number' => 4
        ]);
        QueueNumber::create([
            'number' => 5
        ]);
        QueueNumber::create([
            'number' => 6
        ]);
        QueueNumber::create([
            'number' => 7
        ]);
        QueueNumber::create([
            'number' => 8
        ]);
        QueueNumber::create([
            'number' => 9
        ]);
        QueueNumber::create([
            'number' => 10
        ]);

        User::create([
            'name' => 'Argenis Rodriguez',
            'email' => 'estefreric@gmail.com',
            'username' => 'admin',
            'image' => 'profil-images/man.jpeg',
            'is_admin' => 1,
            'gender' => 'Masculino',
            'password' => bcrypt('@Admin123')
        ]);
        User::create([
            'name' => 'Ali Rodriguez',
            'email' => 'alirodriguez067@gmail.com ',
            'username' => 'admin2',
            'image' => 'profil-images/man.jpeg',
            'is_admin' => 2,
            'gender' => 'Masculino',
            'password' => bcrypt('@Admin123')
        ]);
    }
}
