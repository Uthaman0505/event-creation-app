<?php

namespace App\Http\Livewire\Admin;

use App\Models\Event;
use Livewire\Component;

class AdminEventComponent extends Component
{
    public function render()
    {
        $events = Event::all();
        return view('livewire.admin.admin-event-component', ['events' => $events])->layout('layouts.base');
    }
}
