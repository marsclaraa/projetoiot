<?php

namespace App\Livewire\Registros;

use App\Models\Registro;
use Livewire\Component;
use Livewire\WithPagination;

class RegistroList extends Component
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
        $registro = Registro::orderBy('data_hora', 'desc')
            ->orwhere('data_hora', 'like', "%{$this->search}%")
            ->orwhere('valor', 'like', "%{$this->search}%")
            ->orwhere('unidade', 'like', "%{$this->search}%")
            ->orwhere('sensor_id', 'like', "%{$this->search}%")
            ->paginate($this->perPage);

        return view('livewire.registros.registro-list', compact('registro'));
    }


    //deletar registros
    public function delete($id)
    {
        $registro = Registro::findOrFail($id);
        $registro->delete();
        session()->flash('message', 'Registro deletado com sucesso.');
    }
}
