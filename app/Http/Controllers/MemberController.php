<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:members',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        Member::create($validated);

        return redirect()->route('members.index')->with('success', 'Member added successfully!');
    }

    public function show(Member $member)
    {
        $books = $member->books()->withPivot('borrowed_date', 'due_date')->get();
        return view('members.show', compact('member', 'books'));
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:members,email,'.$member->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $member->update($validated);

        return redirect()->route('members.index')->with('success', 'Member updated successfully!');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully!');
    }
}
