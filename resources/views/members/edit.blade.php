@extends('layouts.app')

@section('title', 'Edit ')

@section('content')
    <div class="container">
        <h1>Edit Member</h1>

        <form action="{{ route('members.update', $member) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $member->first_name) }}" required>
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $member->last_name) }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $member->email) }}" required>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $member->phone) }}" required>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $member->address) }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection
