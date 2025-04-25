@extends('layouts.app')

@section('title', 'Show')

@section('content')
    <div class="container">
        <h1>Author Details</h1>

        <div class="card">
            <div class="card-body">
                <h3>{{ $author->first_name }} {{ $author->last_name }}</h3>
                <p><strong>Birth Year:</strong> {{ $author->birth_year ?? 'N/A' }}</p>
                <p><strong>Birth Place:</strong> {{ $author->birth_place ?? 'N/A' }}</p>
                <p><strong>Bio:</strong></p>
                <p>{{ $author->bio ?? 'No bio available.' }}</p>
            </div>
        </div>

        <a href="{{ route('authors.index') }}" class="btn btn-secondary mt-3">Back to Authors</a>
    </div>
@endsection
