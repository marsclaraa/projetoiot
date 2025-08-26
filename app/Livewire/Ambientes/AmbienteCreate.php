<?php

namespace App\Livewire\Ambientes;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteCreate extends Component

{
    public $nome;
    public $descricao;
    public $status;

    protected $rules = [
    'nome' => 'required|string|max:100',
    'descricao'=> 'required',
    'status'=> 'required',
    ];

     protected $messages = [];
        

    public function store()
    {
        $this->validate();

        Ambiente::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status,

        ]);

        session()->flash('success', 'Cadastro Realizado');

        $this->reset(['nome','descricao','status']);
    }

    public function render()
    {
        return view('livewire.ambientes.ambiente-create');
    }
}

  
