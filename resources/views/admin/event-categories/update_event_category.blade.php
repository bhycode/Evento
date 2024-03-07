@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Update Event Category</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.event-categories.update', $eventCategory->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $eventCategory->name }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
