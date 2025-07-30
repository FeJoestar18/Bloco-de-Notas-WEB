<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index(Request $request)
    {
         $query = Note::query();

         if ($request->filled('visibility') && $request->visibility === 'public') {
             $query->where('is_public', true);
         } else if ($request->filled('mine') && $request->mine && Auth::check()) {
             $query->where('user_id', Auth::id());
         } else {
             $query->where(function($q) {
                 $q->where('is_public', true);

                 if (Auth::check()) {
                     $q->orWhere('user_id', Auth::id());
                 }
             });
         }

         if($request->filled('search')) {
             $query->where(function($q) use ($request) {
                 $q->where('title', 'like', '%' . $request->search . '%')
                   ->orWhere('content', 'like', '%' . $request->search . '%');
             });
         }

         $notes = $query->latest()->get();

         $viewTitle = "Todas as Notas";
         if ($request->filled('visibility') && $request->visibility === 'public') {
             $viewTitle = "Notas Públicas";
         } else if ($request->filled('mine') && $request->mine) {
             $viewTitle = "Minhas Notas";
         }

         return view('notes.index', compact('notes', 'viewTitle'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_public' => 'boolean'
        ]);

        $wantsPrivateNote = !$request->has('is_public') || $request->is_public == false;

        if ($wantsPrivateNote && !Auth::check()) {
            return redirect()->route('login')->with('error', 'Você precisa fazer login para criar notas privadas. Faça login e tente novamente.');
        }

        if (!Auth::check()) {
            $data['is_public'] = true;
            $data['user_id'] = null;
        } else {
            $data['is_public'] = $request->has('is_public') ? true : false;
            $data['user_id'] = Auth::id();
        }

        Note::create($data);

        return redirect()->route('notes.index')->with('success', 'Nota criada com sucesso!');
    }

    public function show(Note $note)
    {
        if (!$note->is_public && (!Auth::check() || $note->user_id !== Auth::id())) {
            abort(403, 'Você não tem permissão para visualizar esta nota.');
        }

        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para editar esta nota.');
        }

        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para atualizar esta nota.');
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_public' => 'boolean'
        ]);

        $data['is_public'] = $request->has('is_public') ? true : false;

        $note->update($data);

        return redirect()->route('notes.show', $note)->with('success', 'Nota atualizada com sucesso!');
    }

    public function destroy(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para excluir esta nota.');
        }

        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Nota excluída com sucesso!');
    }
}
