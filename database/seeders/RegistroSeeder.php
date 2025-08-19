<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');
        $sensores = Sensor::all();

        $unidadesPorTipo = [
            'temperatura' => 'ºC',
            'umidade' => '%',
            'luminosidade' => 'Lux',
            'presenca' => 'ON',

        ];

        $dataAtual = Carbon::now('America/Sao_Paulo')->subMonth();
        $dataFinal = Carbon::now('America/Sao_Paulo');

        while($dataAtual->lessThanOrEqualTo($dataFinal)) {
            foreach($sensores as $sensor){
                $tipo = $sensor->tipo;

                $unidade = $unidadesPorTipo[$tipo] ?? '';

                swich($tipo){
                    case 'temperatura':
                        $valor = $faker->ramdomFloat(2,15,35);
                        break;
                        case 'umidade':
                            $valor = $faker->ramdomFloat(2,20,90);
                            break;
                }
            }
        }
    }
}
