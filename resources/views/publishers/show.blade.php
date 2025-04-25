@extends('layouts.app')

@section('title', 'Show')

@section('content')
    <div class="container">
        <h1>Publisher Details</h1>

        <div class="card">
            <div class="card-body">
                <h3>{{ $publisher->name }}</h3>
                <p><strong>Address:</strong> {{ $publisher->address ?? 'N/A' }}</p>
                <p><strong>Description:</strong> {{ $publisher->description ?? 'No description' }}</p>
            </div>
        </div>

        <a href="{{ route('publishers.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection
