@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Publishers</h1>

        <a href="{{ route('publishers.create') }}" class="btn btn-primary mb-3">Add New Publisher</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($publishers as $publisher)
                <tr>
                    <td>{{ $publisher->id }}</td>
                    <td>{{ $publisher->name }}</td>
                    <td>{{ $publisher->address }}</td>
                    <td>{{ $publisher->description }}</td>
                    <td>
                        <a href="{{ route('publishers.show', $publisher) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('publishers.edit', $publisher) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('publishers.destroy', $publisher) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
