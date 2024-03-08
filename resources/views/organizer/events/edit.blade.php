@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Event</h2>

        <form action="{{ route('organizer.events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $event->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $event->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="startDateTime" class="form-label">Start Date and Time</label>
                <?php
                $startDateTime = $event->startDateTime instanceof \DateTime ? $event->startDateTime : \Carbon\Carbon::parse($event->startDateTime);
                ?>
                <input type="datetime-local" class="form-control" id="startDateTime" name="startDateTime" value="{{ old('startDateTime', $startDateTime->format('Y-m-d\TH:i')) }}" required>
            </div>

            <div class="mb-3">
                <label for="endDateTime" class="form-label">End Date and Time</label>
                <?php
                $endDateTime = $event->endDateTime instanceof \DateTime ? $event->endDateTime : \Carbon\Carbon::parse($event->endDateTime);
                ?>
                <input type="datetime-local" class="form-control" id="endDateTime" name="endDateTime" value="{{ old('endDateTime', $endDateTime->format('Y-m-d\TH:i')) }}" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $event->location) }}" required>
            </div>

            <div class="mb-3">
                <label for="availableSeats" class="form-label">Available Seats</label>
                <input type="number" class="form-control" id="availableSeats" name="availableSeats" value="{{ old('availableSeats', $event->availableSeats) }}" required>
            </div>

            <!-- Add other form fields based on your Event model attributes -->

            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
@endsection
