<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{

    public $temperatura;
    public $luminosidade;
    public $umidade;
    public $ultimoRegistro;

    public $labelsTemperatura = [];
    public $dadosTemperatura = [];
    public $labelsSensores = [];
    public $dadosSensores = [];
    // labels -> legenda para identificar OQ É 

    public function mount()
    {
        $this->carregarDados();
    }
    public function carregarDados() {}

      public function logout()
    {
        Auth::logout(); // Usa a fachada Auth importada corretamente

        // É uma boa prática invalidar a sessão e regenerar o token por segurança
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
