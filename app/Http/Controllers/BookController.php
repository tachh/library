<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'category', 'publisher'])->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('books.create', compact('authors', 'categories', 'publishers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'publisher_id' => 'required|exists:publishers,id',
            'pages' => 'required|integer',
            'language' => 'required|string|max:50',
            'isbn' => 'required|string|max:20|unique:books',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'available' => 'boolean',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('book_covers', 'public');
        }

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('books.edit', compact('book', 'authors', 'categories', 'publishers'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'publisher_id' => 'required|exists:publishers,id',
            'pages' => 'required|integer',
            'language' => 'required|string|max:50',
            'isbn' => 'required|string|max:20|unique:books,isbn,'.$book->id,
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'available' => 'boolean',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('book_covers', 'public');
        }

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
