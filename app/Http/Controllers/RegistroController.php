<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Models\Registro;
use App\Models\Sensor;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function store (RegistroRequest $request){

 $sensor = Sensor::where('codigo', 'like'. $request->codigo)->first();
if($sensor == null){
    return response()->json([
        'status' =>false,
        'message' => 'nao foi possivel'
    ]);
}
        $registro = Registro::create([
            'sensor_id' => $request-> sensor_id,
            'valor'=> $request->valor,
            'unidade'=> $request-> unidade,
            'data_hora'=>$request -> data_hora,
        ]);
        return $registro;
    }

}
