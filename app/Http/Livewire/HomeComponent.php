<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        // if (Auth::user()->user_role == 'ADMIN') {
        //     $events = Event::all();
        //     return view('livewire.admin.admin-event-component', ['events' => $events])->layout('layouts.base');
        // }
        return view('livewire.home-component')->layout('layouts.base');
    }
}
