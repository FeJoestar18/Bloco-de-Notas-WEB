@extends('layouts.app')

@section('content')
    <h1>Nova Nota</h1>
    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <label>Título:</label>
        <input type="text" name="title" required>
        <br>
        <label>Conteúdo:</label>
        <textarea name="content" required></textarea>
        <br>
        <button type="submit">Salvar</button>
    </form>
    <a href="{{ route('notes.index') }}">Voltar</a>
@endsection
