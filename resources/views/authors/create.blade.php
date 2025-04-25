@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Author</h1>

        <form action="{{ route('authors.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Birth Year</label>
                <input type="number" name="birth_year" class="form-control">
            </div>

            <div class="form-group">
                <label>Birth Place</label>
                <input type="text" name="birth_place" class="form-control">
            </div>

            <div class="form-group">
                <label>Bio</label>
                <textarea name="bio" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Save</button>
        </form>
    </div>
@endsection
