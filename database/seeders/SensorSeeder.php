<?php

namespace Database\Seeders;

use App\Models\Sensor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        for ($i = 1; $i <= 40; $i++) {
            Sensor::create([
                'codigo' => 's' . $i,
                'tipo' => $faker->radomEElement([
                'lumininosidade',
                'rfid',
                'imfrsvermelho',
                'temperatura'.
                'umidade',
                
                ]),
                'descricao' => $faker->sentence(),
                'status' => $faker->boolean(90),
                'ambiente_id' =>$ambientes-> ramdom() -> id 
            ]);
        }
    }
}