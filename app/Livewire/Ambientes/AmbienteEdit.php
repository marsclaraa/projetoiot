<?php

namespace App\Livewire\Ambientes;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteEdit extends Component
{

    public $id;
    public $nome;
    public $descricao;
    public $status;

    protected $rules = [
        'nome' => 'required|string|max:100',
        'descricao' => 'required',
        'status'=>'required',
    ];

     protected $messages = [
        'nome.required'=>'Este campo é obrigatório',
        'nome.string'=>'Este campo não pode conter números',
        'nome.max'=>'Você ultrapassou o limite de caracteries',
        'descricao.required'=>'Este campo é obrigatório',
        'status.required'=>'Este campo é obrigatório'
    ];


    public function mount($id)
    {

        $ambiente = Ambiente::findOrFail($id);
        $this->id = $ambiente->id;
        $this->nome = $ambiente->nome;
        $this->descricao = $ambiente->descricao;
        $this->status = $ambiente->status;
    }

    public function edit()
    {
        $ambiente = Ambiente::findOrFail($this->id);

        $ambiente->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status
        ]);

        session()->flash('message', 'Ambiente atualizado com sucesso!');

        return redirect()->route('ambiente.list');
    }

    public function render()
    {
        return view('livewire.ambientes.ambiente-edit');
    }
}
