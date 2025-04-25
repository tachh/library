@extends('layouts.app')

@section('title', 'Show')

@section('content')
    <div class="container">
        <h1>Category Details</h1>

        <div class="card">
            <div class="card-body">
                <h3>{{ $category->name }}</h3>
                <p>{{ $category->description ?? 'No description' }}</p>
            </div>
        </div>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection
