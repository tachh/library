@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Member Details</h1>

        <div class="card">
            <div class="card-body">
                <h3>{{ $member->first_name }} {{ $member->last_name }}</h3>
                <p><strong>Email:</strong> {{ $member->email }}</p>
                <p><strong>Phone:</strong> {{ $member->phone }}</p>
                <p><strong>Address:</strong> {{ $member->address }}</p>
            </div>
        </div>

        @if($books->isNotEmpty())
            <h4 class="mt-4">Borrowed Books</h4>
            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Borrowed Date</th>
                    <th>Due Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->pivot->borrowed_date }}</td>
                        <td>{{ $book->pivot->due_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="mt-3">This member has not borrowed any books.</p>
        @endif

        <a href="{{ route('members.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection
