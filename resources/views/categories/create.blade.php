@extends('layouts.app')

@section('title', 'Add New Category')

@section('content')
    <div class="container">
        <h1>Add Category</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
@endsection
