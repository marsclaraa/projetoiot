<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;


    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'password.required' => 'Senha obrigatória',
        'email.required' => 'Email obrigatório',
    ];

    public function login()
    {
        if (Auth::attempt(['email' => $this->email,  'password' => $this->password])) {
            session()->regenerate();

            return redirect()->route('dashboard');
        }

        session()->flash('error', 'credenciais incorretas');
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
