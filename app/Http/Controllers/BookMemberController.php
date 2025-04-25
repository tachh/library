<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;

class BookMemberController extends Controller
{
    public function create(Book $book)
    {
        $members = Member::all();
        return view('book_members.create', compact('book', 'members'));
    }

    public function store(Request $request, Book $book)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'borrowed_date' => 'required|date',
            'due_date' => 'required|date|after:borrowed_date',
        ]);

        $book->members()->attach($validated['member_id'], [
            'borrowed_date' => $validated['borrowed_date'],
            'due_date' => $validated['due_date'],
        ]);

        return redirect()->route('books.show', $book)->with('success', 'Book assigned to member successfully!');
    }

    public function edit(Book $book, Member $member)
    {
        $bookMember = $book->members()->where('member_id', $member->id)->first();
        return view('book_members.edit', compact('book', 'member', 'bookMember'));
    }

    public function update(Request $request, Book $book, Member $member)
    {
        $validated = $request->validate([
            'borrowed_date' => 'required|date',
            'due_date' => 'required|date|after:borrowed_date',
        ]);

        $book->members()->updateExistingPivot($member->id, [
            'borrowed_date' => $validated['borrowed_date'],
            'due_date' => $validated['due_date'],
        ]);

        return redirect()->route('books.show', $book)->with('success', 'Book-member relationship updated successfully!');
    }

    public function destroy(Book $book, Member $member)
    {
        $book->members()->detach($member->id);
        return redirect()->route('books.show', $book)->with('success', 'Book-member relationship removed successfully!');
    }
}
