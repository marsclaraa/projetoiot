<?php

namespace App\Livewire\Ambientes;

use App\Models\Ambiente;
use Livewire\Component;
use Livewire\WithPagination;

class AmbienteList extends Component


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
        $ambiente = Ambiente::where('nome', 'like', "%{$this->search}%")
            ->paginate($this->perPage);


        return view('livewire.ambientes.ambiente-list',compact('ambiente'));
    }


    //deletar alunos
    public function delete($id)
    {
        $ambiente = Ambiente::findOrFail($id);
        $ambiente->delete();
        session()->flash('message', 'Aluno deletado com sucesso.');
    }

}
