<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name;
    public $email;
    public $password;
    protected $rules = [
        'name' => 'required|min:3|max:100',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ];
    public function render()
    {
        return view('livewire.register-form');
    }
    public function register()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
        $this->reset('name','email','password');
        $this->redirect('/login');
    }
}
