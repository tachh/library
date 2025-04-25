@extends('layouts.app')

@section('title', 'Add New Book')

@section('content')
    <h1>Add New Book</h1>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="author_id" class="form-label">Author</label>
            <select class="form-select" id="author_id" name="author_id" required>
                <option value="">Select Author</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="publisher_id" class="form-label">Publisher</label>
            <select class="form-select" id="publisher_id" name="publisher_id" required>
                <option value="">Select Publisher</option>
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pages" class="form-label">Pages</label>
            <input type="number" class="form-control" id="pages" name="pages" required>
        </div>

        <div class="mb-3">
            <label for="language" class="form-label">Language</label>
            <input type="text" class="form-control" id="language" name="language" required>
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>

        <div class="mb-3">
            <label for="cover" class="form-label">Cover Image</label>
            <input type="file" class="form-control" id="cover" name="cover">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="available" name="available" value="1" checked>
            <label class="form-check-label" for="available">Available</label>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
@endsection
