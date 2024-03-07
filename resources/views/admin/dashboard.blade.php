@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        <h2>Welcome to the Admin Dashboard</h2>
                        <p>This is the admin's control panel.</p>

                        <h5>Users management:</h5>

                        <ul class="list-group">
                            @foreach($users as $user)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $user->name }}
                                    @if($user->role == 1)
                                        <span class="badge badge-primary badge-pill">User</span>
                                    @elseif($user->role == 2)
                                        <span class="badge badge-success badge-pill">Organizer</span>
                                    @elseif($user->role == 3)
                                        <span class="badge badge-danger badge-pill">Admin</span>
                                    @else
                                        <span class="badge badge-secondary badge-pill">Unknown Role</span>
                                    @endif
                                    <form action="{{ route('admin.soft-delete', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        @if($user->role != 3)
                                            <button type="submit" class="btn btn-danger btn-sm">Soft Delete</button>
                                        @else
                                            <button type="submit" class="btn btn-danger btn-sm" disabled>Soft Delete</button>
                                        @endif
                                    </form>
                                </li>
                            @endforeach
                        </ul>

                        <h5 class="mt-4">EventCategories management:</h5>

                        <div class="mb-3">
                            <a href="{{ route('admin.event-categories.create') }}" class="btn btn-primary">Add EventCategory</a>
                        </div>

                        <ul class="list-group">
                            @foreach($eventCategories as $eventCategory)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $eventCategory->name }}
                                    <div class="btn-group">
                                        <a href="{{ route('admin.event-categories.edit', $eventCategory->id) }}" class="btn btn-success btn-sm mr-2">Edit</a>
                                        <form action="{{ route('admin.event-categories.destroy', $eventCategory->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
