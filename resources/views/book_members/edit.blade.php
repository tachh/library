@extends('layouts.app')

@section('title', 'Edit Book Assignment')

@section('content')
    <h1>Edit Book Assignment</h1>
    <h3>Book: {{ $book->title }}</h3>
    <h3>Member: {{ $member->first_name }} {{ $member->last_name }}</h3>

    <form action="{{ route('book_members.update', ['book' => $book, 'member' => $member]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="borrowed_date" class="form-label">Borrowed Date</label>
            <input type="date" class="form-control" id="borrowed_date" name="borrowed_date" value="{{ $bookMember->pivot->borrowed_date }}" required>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $bookMember->pivot->due_date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Assignment</button>
    </form>
@endsection
