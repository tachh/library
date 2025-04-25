@extends('layouts.app')

@section('title', 'Add New Member')

@section('content')
    <div class="container">
        <h1>Add Member</h1>

        <form action="{{ route('members.store') }}" method="POST">
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
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Save</button>
        </form>
    </div>
@endsection
