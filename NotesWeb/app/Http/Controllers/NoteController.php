<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        Note::create($request->only(['title', 'content']));
        return redirect()->route('notes.index');
    }

    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $note->update($request->only(['title', 'content']));
        return redirect()->route('notes.index');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index');
    }
}
