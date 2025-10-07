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
    'status'=>'required'
    ];

     protected $messages = [
        'nome.required'=>'Este campo é obrigatório',
        'nome.string'=>'Este campo não pode conter números',
        'nome.max'=>'Você ultrapassou o limite de caracteries',
        'descricao.required'=>'Este campo é obrigatório',
        'status.required'=>'Este campo é obrigatório'
    ];
        

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

        
        return redirect()->route('ambiente.list');
    }

    public function render()
    {
        return view('livewire.ambientes.ambiente-create');
    }
}

  
