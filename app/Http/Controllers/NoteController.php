<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NoteController extends Controller
{
    public function index(): View
    {
        $notes = Note::with('category')->get();
        return view('notes.index', compact('notes'));
    }

    public function create(): View
    {
        $note = new Note();
        $categories = Category::all();
        return view('notes.create', compact('note', 'categories'));
    }

    public function store(NoteRequest $request): RedirectResponse
    {


        Note::create($request->validated());

        return redirect()->route('notes.index')->with('success', 'Nota creada correctamente.');
    }

    public function show(Note $note): View
    {
        $note = Note::with('category')->findOrFail($note->id);

        return view('notes.show', compact('note'));
    }

    public function edit(string $id): View
    {
        $note = Note::with('category')->findOrFail($id);
        $categories = Category::all();

        return view('notes.edit', compact('note', 'categories'));
    }

    public function update(NoteRequest $request, string $id): RedirectResponse
    {
        $note = Note::with('category')->findOrFail($id);
        $note->update($request->validated());

        return redirect()->route('notes.index')->with('success', 'Nota actualizada correctamente.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $note = Note::with('category')->findOrFail($id);
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Nota eliminada.');
    }
}
