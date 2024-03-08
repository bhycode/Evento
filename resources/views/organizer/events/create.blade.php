@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Event</h2>

        <form method="POST" action="{{ route('organizer.events.store') }}">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="startDateTime">Start Date and Time</label>
                <input type="datetime-local" name="startDateTime" id="startDateTime" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="endDateTime">End Date and Time</label>
                <input type="datetime-local" name="endDateTime" id="endDateTime" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="availableSeats">Available Seats</label>
                <input type="number" name="availableSeats" id="availableSeats" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>
    </div>
@endsection
