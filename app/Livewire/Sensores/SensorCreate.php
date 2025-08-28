<?php

namespace App\Livewire\Sensores;

use App\Models\Ambiente;
use App\Models\Sensor;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class SensorCreate extends Component
{
    public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;


    protected $rules = [
        'ambiente_id'=>'required',
        'codigo' => 'required|string|unique:sensors',
        'tipo' => 'required|string',
        'descricao' => 'required',
        'status' => 'required'
    ];

    protected $messages = [
        'ambiente_id.required'=>'Este campo é obrigatório',
        'codigo.required'=>'Este campo é obrigatório',
        'codigo.string'=>'Este campo não pode conter números',
        'codigo.unique'=>'Este campo deve ser único',
        'tipo.string'=>'Este campo não pode conter números',
        'tipo.required'=> 'Este campo é obrigatório',
        'descricao.required'=>'Este campo é obrigatório',
        'status.required'=>'Este campo é obrigatório'
    ];


    public function store()
    {
        $this->validate();

        Sensor::create([
            'ambiente_id' => $this ->ambiente_id,
            'codigo' => $this->codigo,
            'tipo'    => $this->tipo,
            'descricao' => $this->descricao,
            'status'   => $this->status,
        ]);

        session()->flash('success', 'Cadastro Realizado');

        $this->reset(['codigo', 'tipo', 'descricao', 'status']);

        return redirect()->route('dashboard');
    }


    public function render()
    {
        $ambientes = Ambiente::all();
        return view('livewire.sensores.sensor-create',compact('ambientes'));
    }
}
