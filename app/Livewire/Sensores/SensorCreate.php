<?php

namespace App\Livewire\Sensores;

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
        'codigo' => 'required|string|unique:sensors',
        'tipo' => 'required|string',
        'descricao' => 'required|string',
        'status' => 'required'
    ];

    protected $messages = [];


    public function store()
    {
        $this->validate();


        Sensor::create([
            'ambiente_id' => $this->ambiente->id,
            'codigo' => $this->codigo,
            'tipo'    => $this->tipo,
            'descricao' => $this->descricao,
            'status'   => $this->status,


        ]);

        session()->flash('success', 'Cadastro Realizado');

        $this->reset(['codigo', 'tipo', 'descricao', 'status']);
    }



    public function render()
    {
        return view('livewire.sensores.sensor-create');
    }
}
