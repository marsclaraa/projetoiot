<?php

namespace App\Http\Controllers;

use App\Models\Ambiente;
use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function find(Request $request)
    {

        $sensor = Sensor::where('codigo', '=', $request->codigo)->first();
        if ($sensor == null) { // Verifica se um sensor foi encontrado.
            return response()->json([
                'status' => false,
                'message' => 'status não encontrado'
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'status encontrado',
            'data' => $sensor->status
        ]);
    }

//atualizar status do sensor
    public function update(Request $request){
        $sensor = Sensor::where('codigo', '=',$request->codigo)->first();
        if($sensor == null){
            return response()->json([
                'status' => false,
                'message'=> 'Sensor não encontrado'
            ]);
        }

        $sensor->update(['status'=> $request->status]);
        return response()->json([
            'message' => 'Código do sensor atualizado com sucesso',
            'status' => true
        ]);
    }


    public function show($id){
        $sensor = Sensor::findOrFail($id);

        return response()->json($sensor);
    }

    public function index()
    {
        $sensor = Sensor::all(); 
        return response()->json($sensor);
    }
}
