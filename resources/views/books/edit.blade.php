@extends('layouts.app')

@section('title', 'Edit ' . $book->title)

@section('content')
    <h1>Edit {{ $book->title }}</h1>

    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
        </div>

        <div class="mb-3">
            <label for="author_id" class="form-label">Author</label>
            <select class="form-select" id="author_id" name="author_id" required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                        {{ $author->first_name }} {{ $author->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="publisher_id" class="form-label">Publisher</label>
            <select class="form-select" id="publisher_id" name="publisher_id" required>
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}" {{ $book->publisher_id == $publisher->id ? 'selected' : '' }}>
                        {{ $publisher->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pages" class="form-label">Pages</label>
            <input type="number" class="form-control" id="pages" name="pages" value="{{ $book->pages }}" required>
        </div>

        <div class="mb-3">
            <label for="language" class="form-label">Language</label>
            <input type="text" class="form-control" id="language" name="language" value="{{ $book->language }}" required>
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}" required>
        </div>

        <div class="mb-3">
            <label for="cover" class="form-label">Cover Image</label>
            <input type="file" class="form-control" id="cover" name="cover">
            @if($book->cover)
                <p class="mt-2">Current cover: <a href="{{ asset('storage/' . $book->cover) }}" target="_blank">View</a></p>
            @endif
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="available" name="available" value="1" {{ $book->available ? 'checked' : '' }}>
            <label class="form-check-label" for="available">Available</label>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $book->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
@endsection
