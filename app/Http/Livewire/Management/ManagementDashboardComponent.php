<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;

class ManagementDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.management.management-dashboard-component')->layout('layouts.base');
    }
}
