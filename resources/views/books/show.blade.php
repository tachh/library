@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <div class="row">
        <div class="col-md-4">
            @if($book->cover)
                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="img-fluid mb-3">
            @endif
        </div>
        <div class="col-md-8">
            <h1>{{ $book->title }}</h1>
            <p><strong>Author:</strong> {{ $book->author->first_name }} {{ $book->author->last_name }}</p>
            <p><strong>Category:</strong> {{ $book->category->name }}</p>
            <p><strong>Publisher:</strong> {{ $book->publisher->name }}</p>
            <p><strong>Pages:</strong> {{ $book->pages }}</p>
            <p><strong>Language:</strong> {{ $book->language }}</p>
            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
            <p><strong>Available:</strong> {{ $book->available ? 'Yes' : 'No' }}</p>
            <p><strong>Description:</strong> {{ $book->description }}</p>

            <div class="mt-4">
                <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="{{ route('book_members.create', $book) }}" class="btn btn-success">Assign to Member</a>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h3>Borrowing History</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Member</th>
                <th>Borrowed Date</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($book->members as $member)
                <tr>
                    <td>{{ $member->first_name }} {{ $member->last_name }}</td>
                    <td>{{ $member->pivot->borrowed_date }}</td>
                    <td>{{ $member->pivot->due_date }}</td>
                    <td>
                        <a href="{{ route('book_members.edit', ['book' => $book, 'member' => $member]) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('book_members.destroy', ['book' => $book, 'member' => $member]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
