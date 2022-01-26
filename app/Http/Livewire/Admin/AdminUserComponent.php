<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminUserComponent extends Component
{
    public function render()
    {
        $users = User::orderBy('id')->get();
        return view('livewire.admin.admin-user-component', ['users' => $users])->layout('layouts.base');
    }
}
