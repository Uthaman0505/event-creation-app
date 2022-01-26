<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminAddUserComponent extends Component
{

    public $name;
    public $email;
    public $password;
    public $user_role;

    public function mount()
    {
        $this->user_role = 'USER';
    }

    public function create_user()
    {
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->user_role = $this->user_role;
        $user->save();
    }


    public function render()
    {
        return view('livewire.admin.admin-add-user-component')->layout('layouts.base');
    }
}
