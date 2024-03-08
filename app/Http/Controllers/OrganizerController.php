<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function dashboard()
    {
        $events = Event::all();
        return view('organizer.dashboard', compact('events'));
    }

    public function index()
    {
        $events = Event::all();
        return view('organizer.events.index', compact('events'));
    }

    public function create()
    {
        $categories = EventCategory::all();
        return view('organizer.events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validation logic
        $this->validate($request, [
            'startDateTime' => 'required|date',
            'endDateTime' => 'required|date|after_or_equal:startDateTime',
        ]);

        Event::create($request->all());

        return redirect()->route('organizer.dashboard')->with('success', 'Event created successfully');
    }

    public function edit(Event $event)
    {
        return view('organizer.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'startDateTime' => 'required|date',
            'endDateTime' => 'required|date|after_or_equal:startDateTime',
        ]);

        $event->update($request->all());

        return redirect()->route('organizer.dashboard')->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('organizer.dashboard')->with('success', 'Event deleted successfully');
    }
}
