@extends('layouts.app')

@section('content')
    <h1>Editar Nota</h1>
    <form action="{{ route('notes.update', $note) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Título:</label>
        <input type="text" name="title" value="{{ $note->title }}" required>
        <br>
        <label>Conteúdo:</label>
        <textarea name="content" required>{{ $note->content }}</textarea>
        <br>
        <button type="submit">Atualizar</button>
    </form>
    <a href="{{ route('notes.index') }}">Voltar</a>
@endsection
