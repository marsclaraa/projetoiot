<?php

namespace App\Livewire\Sensores;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;
use Livewire\WithPagination;

class SensorEdit extends Component
{

    public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;
    public $sensorId;
    public $ambiente;


    protected $rules = [
        'ambiente_id' => 'required',
        'codigo' => 'required|string|unique:sensors',
        'tipo' => 'required|string',
        'descricao' => 'required',
        'status' => 'required'
    ];

    protected $messages = [
        'ambiente_id.required' => 'Este campo é obrigatório',
        'codigo.required' => 'Este campo é obrigatório',
        'codigo.string' => 'Este campo não pode conter números',
        'codigo.unique' => 'Este campo deve ser único',
        'tipo.string' => 'Este campo não pode conter números',
        'tipo.required' => 'Este campo é obrigatório',
        'descricao.required' => 'Este campo é obrigatório',
        'status.required' => 'Este campo é obrigatório'

    ];



    public function mount($id)
    {

        $sensor = Sensor::findOrFail($id);

        $this->sensorId = $sensor->id;
        $this->ambiente_id = $sensor->ambiente_id;
        $this->codigo = $sensor->codigo;
        $this->tipo = $sensor->tipo;
        $this->descricao = $sensor->descricao;
        $this->status = $sensor->status;
    }

    public function edit()
    {
        $sensor = Sensor::findOrFail($this->sensorId);

        $sensor->update([
            'ambiente_id' => $this->ambiente_id,
            'codigo' => $this->codigo,
            'tipo' => $this->tipo,
            'descricao' => $this->descricao,
            'status' => $this->status
        ]);

        session()->flash('message', 'Sensor atualizado com sucesso!');

        return redirect()->route('sensor.list');
    }

    public function render()
    {
        $ambientes = Ambiente::all();
        return view('livewire.sensores.sensor-edit', compact('ambientes'));
    }
}
