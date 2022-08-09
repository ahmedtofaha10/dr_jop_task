<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use withPagination;
    public $temp_user = [
        'name' => '',
        'email' => '',
        'is_active' => false,
    ];
    public $editing_user;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $users = User::query()->role('user')->paginate(10);
        return view('livewire.users-list', compact('users'));
    }
    public function updatedEditingUser(){
        if ($this->editing_user){
            $user = User::query()->find($this->editing_user);
            $this->temp_user = [
                'name' => $user->name,
                'email' => $user->email,
                'is_active' => $user->is_active,
            ];
        }else{
            $this->reset('temp_user');
        }

    }
    public function deleteUser($id)
    {
        $user = User::query()->find($id);
        $user->delete();
        session()->flash('message', 'User deleted successfully');
        $this->resetPage();
    }
    public function save($id)
    {
        $user = User::query()->find($id);
        $user->update($this->temp_user);
        $this->reset('temp_user','editing_user');
        session()->flash('message', 'User updated successfully');
        $this->resetPage();
    }
}
