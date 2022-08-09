<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;
     protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6',
    ];
    public function render()
    {
        return view('livewire.login-form');
    }
    public function login()
    {
        $this->validate();
        // check if user is active
        $user = User::query()->firstWhere('email', $this->email);
        if (!$user->is_active) {
            $this->addError('email', 'User is not active');
        }else{
            if (auth()->attempt([
                'email' => $this->email,
                'password' => $this->password,
            ])){
                $this->reset('email','password');
                $this->redirect('/dashboard');
            }else{
                $this->addError('email', 'These credentials do not match our records.');
            }
        }


    }
}
