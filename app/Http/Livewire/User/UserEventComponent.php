<?php

namespace App\Http\Livewire\User;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserEventComponent extends Component
{
    public function render()
    {
        $events = Event::where('user_id', Auth::user()->id)->get();
        return view('livewire.user.user-event-component', ['events' => $events])->layout('layouts.base');
    }
}
