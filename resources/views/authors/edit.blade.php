@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Author</h1>

        <form action="{{ route('authors.update', $author) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $author->first_name) }}" required>
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $author->last_name) }}" required>
            </div>

            <div class="form-group">
                <label>Birth Year</label>
                <input type="number" name="birth_year" class="form-control" value="{{ old('birth_year', $author->birth_year) }}">
            </div>

            <div class="form-group">
                <label>Birth Place</label>
                <input type="text" name="birth_place" class="form-control" value="{{ old('birth_place', $author->birth_place) }}">
            </div>

            <div class="form-group">
                <label>Bio</label>
                <textarea name="bio" class="form-control">{{ old('bio', $author->bio) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection
