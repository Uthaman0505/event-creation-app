<?php

namespace App\Http\Livewire\Management;

use App\Models\User;
use Livewire\Component;

class ManagementUserComponent extends Component
{
    public function render()
    {
        $users = User::orderBy('id')->get();
        return view('livewire.management.management-user-component', ['users' => $users])->layout('layouts.base');
    }
}
