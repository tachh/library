@extends('layouts.app')

@section('title', 'Add New Publisher')

@section('content')
    <div class="container">
        <h1>Add Publisher</h1>

        <form action="{{ route('publishers.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Save</button>
        </form>
    </div>
@endsection
