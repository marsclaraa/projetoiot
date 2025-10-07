<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Models\Registro;
use App\Models\Sensor;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function store(RegistroRequest $request)
    {

        $sensor = Sensor::where('codigo', '=', $request->cod_sensor)->first(); //first pega o primeiro registro de acordo com a coluna código
        if ($sensor == null) {
            return response()->json(['error' => 'sensor não encontrado'], 404);
        }
        $registro = Registro::create([
            'sensor_id' => $sensor->id,
            'valor' => $request->valor,
            'unidade' => $request->unidade,
            'data_hora' => now() //pega a data hora deste momento
        ]);
        return response()->json([
            'success' => 'registro salvo com sucesso',
            'data' => $registro
        ], 201);
    }

    // public function index(){
    //     $registros = Registro::orderBy('id','desc')->get();
    //     return response()->json()
    // }
}
