<?php

namespace App\Http\Livewire\Management;

use App\Models\Event;
use Livewire\Component;

class ManagementEventComponent extends Component
{
    public function render()
    {
        $events = Event::all();
        return view('livewire.management.management-event-component', ['events' => $events])->layout('layouts.base');
    }
}
