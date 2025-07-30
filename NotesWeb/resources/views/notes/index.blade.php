@extends('layouts.app')

@section('content')
<div class="notes-container">
    <div class="header">
        <h1>Minhas Notas</h1>
        <a href="{{ route('notes.create') }}" class="btn-create">
            <span class="icon">+</span> Nova Nota
        </a>
    </div>

    <div class="search-container">
        <form action="{{ route('notes.index') }}" method="GET" class="search-form">
            <div class="search-input-wrapper">
                <input type="text" name="search" placeholder="Buscar notas..." value="{{ request('search') }}">
                <button type="submit" class="search-button">
                    <span class="search-icon">🔍</span>
                </button>
            </div>
            @if(request('search'))
                <a href="{{ route('notes.index') }}" class="clear-search">Limpar busca</a>
            @endif
        </form>
    </div>

    <div class="notes-list">
        @foreach($notes as $note)
            <div class="note-card">
                <div class="note-content">
                    <a href="{{ route('notes.show', $note) }}" class="note-title">{{ $note->title }}</a>
                </div>
                <div class="note-actions">
                    <a href="{{ route('notes.edit', $note) }}" class="btn-edit">Editar</a>
                    <form action="{{ route('notes.destroy', $note) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Excluir</button>
                    </form>
                </div>
            </div>
        @endforeach

        @if(count($notes) === 0)
            <div class="empty-state">
                <div class="icon">📝</div>
                <p>Você ainda não tem notas.</p>
                <p>Crie sua primeira nota agora!</p>
            </div>
        @endif
    </div>
</div>

<style>

</style>
@endsection
