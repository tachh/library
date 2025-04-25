@extends('layouts.app')

@section('title', 'Assign ' . $book->title . ' to Member')

@section('content')
    <h1>Assign {{ $book->title }} to Member</h1>

    <form action="{{ route('book_members.store', $book) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="member_id" class="form-label">Member</label>
            <select class="form-select" id="member_id" name="member_id" required>
                <option value="">Select Member</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}">{{ $member->first_name }} {{ $member->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="borrowed_date" class="form-label">Borrowed Date</label>
            <input type="date" class="form-control" id="borrowed_date" name="borrowed_date" required>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" required>
        </div>

        <button type="submit" class="btn btn-primary">Assign Book</button>
    </form>
@endsection
