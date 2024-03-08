@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Organizer Dashboard</h2>

        <div class="mb-3">
            <a href="{{ route('organizer.events.create') }}" class="btn btn-primary">Add Event</a>
        </div>

        <h3>Your Events</h3>
        @if($events->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->startDateTime}}</td>
                            <td>{{ $event->endDateTime}}</td>
                            <td>{{ $event->location }}</td>
                            <td>
                                <a href="{{ route('organizer.events.edit', $event) }}" class="btn btn-warning">Update</a>
                                <form action="{{ route('organizer.events.destroy', $event) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No events available.</p>
        @endif
    </div>
@endsection
