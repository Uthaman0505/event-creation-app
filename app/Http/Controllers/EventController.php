<?php

namespace App\Http\Controllers;

use App\Mail\EventStatusMail;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{

    public function addEvent()
    {
        return view('events.add-event');
    }

    public function storeEvent(Request $request)
    {
        $event = new Event();
        $event->user_id = $request->user_id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->save();
        if (Auth::user()->user_role == "ADMIN") {
            return redirect(route('admin.dashboard.events'));
        } elseif (Auth::user()->user_role == "MANAGEMENT") {
            return redirect(route('management.dashboard.events'));
        } else {
            return redirect(route('user.dashboard.events'));
        }
    }

    public function editEvent($id)
    {
        $event = Event::find($id);
        return view('events.edit-event', ['event' => $event]);
    }

    public function updateEvent(Request $request)
    {
        if (Auth::user()->user_role == "ADMIN") {
            $event = Event::find($request->id);
            $event->user_id = $request->user_id;
            $event->title = $request->title;
            $event->description = $request->description;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->status = $request->status;
            $event->save();
            if ($request->status == 1) {
                $details = [
                    'Title' => "Event Title -> $event->title",
                    'Description' => "Event Description -> $event->description",
                    'Start_Date' => "Event Start Date -> $event->start_date",
                    'End_Date' => "Event End Date -> $event->end_date"
                ];
                $users = User::all();
                foreach ($users as $key => $user) {
                    Mail::to($user->email)->send(new EventStatusMail($details));
                }
            }
            return redirect(route('admin.dashboard.events'));
        } elseif (Auth::user()->user_role == "MANAGEMENT") {
            $event = Event::find($request->id);
            $event->user_id = $request->user_id;
            $event->title = $request->title;
            $event->description = $request->description;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->status = 0;
            $event->save();
            return redirect(route('management.dashboard.events'));
        } else {
            $event = Event::find($request->id);
            $event->user_id = $request->user_id;
            $event->title = $request->title;
            $event->description = $request->description;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->status = 0;
            $event->save();
            return redirect(route('user.dashboard.events'));
        }
    }

    public function deleteEvent($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect(route('admin.dashboard.events'));
    }
}
