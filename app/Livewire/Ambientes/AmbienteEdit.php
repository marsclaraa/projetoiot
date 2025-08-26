<?php

namespace App\Livewire\Ambientes;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteEdit extends Component
{

    public $nome;
    public $descricao;
    public $status;

    protected $rules = [
        'nome' => 'required|string|max:100',
        'descricao' => 'required',
        'status' => 'required',
    ];



    public function mount($id)
    {

        $ambiente = Ambiente::findOrFail($id);
        $this->nome = $ambiente->nome;
        $this->descricao = $ambiente->ambiente;
        $this->status = $ambiente->status;
    }

    public function atualizar()
    {
        $ambiente = Ambiente::findOrFail($this->id);

        $ambiente->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status
        ]);

        session()->flash('message', 'Ambiente atualizado com sucesso!');
    }
    public function render()
    {
        return view('livewire.ambiente-edit');
    }
}

