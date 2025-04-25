@extends('layouts.app')

@section('title', 'Authors')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Authors</h1>
            <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Add New Author</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($authors->count())
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Birth Year</th>
                    <th>Birth Place</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->first_name }} {{ $author->last_name }}</td>
                        <td>{{ $author->birth_year }}</td>
                        <td>{{ $author->birth_place }}</td>
                        <td>
                            <a href="{{ route('authors.show', $author) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No authors found.</p>
        @endif
    </div>
@endsection
