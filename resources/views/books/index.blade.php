@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Publisher</th>
            <th>Available</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author->first_name }} {{ $book->author->last_name }}</td>
                <td>{{ $book->category->name }}</td>
                <td>{{ $book->publisher->name }}</td>
                <td>{{ $book->available ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
