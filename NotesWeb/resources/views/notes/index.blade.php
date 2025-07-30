@extends('layouts.app')

@section('content')
    <h1>Notas</h1>
    <a href="{{ route('notes.create') }}">Nova Nota</a>
    <ul>
        @foreach($notes as $note)
            <li>
                <a href="{{ route('notes.show', $note) }}">{{ $note->title }}</a>
                <a href="{{ route('notes.edit', $note) }}">Editar</a>
                <form action="{{ route('notes.destroy', $note) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Deletar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
