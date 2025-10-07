<?php

namespace App\Livewire\Sensores;

use App\Models\Sensor;
use Livewire\Component;
use Livewire\WithPagination;

class SensorList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 15;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 15],
    ];

    public function render()
    {
        $sensor = Sensor::where('codigo', 'like', "%{$this->search}%")
          ->orwhere('tipo', 'like', "%{$this->search}%")
          ->orwhere('ambiente_id', 'like', "%{$this->search}%")
          ->orwhere('descricao', 'like', "%{$this->search}%")
          ->orwhere('status', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

            return view('livewire.sensores.sensor-list',compact('sensor'));
    }


    //deletar alunos
    public function delete($id)
    {
        $sensor = Sensor::findOrFail($id);
        $sensor->delete();
        session()->flash('message', 'Sensor deletado com sucesso.');
    }

}