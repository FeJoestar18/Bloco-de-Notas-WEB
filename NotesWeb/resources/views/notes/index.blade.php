@extends('layouts.app')

@section('content')
<div class="notes-container">
    <div class="header">
        <h1>{{ $viewTitle ?? 'Notas' }}</h1>
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
            <div class="note-card {{ $note->is_public ? 'public-note' : 'private-note' }}">
                <div class="note-content">
                    <div class="note-header">
                        <a href="{{ route('notes.show', $note) }}" class="note-title">{{ $note->title }}</a>
                        <span class="visibility-badge {{ $note->is_public ? 'public' : 'private' }}">
                            {{ $note->is_public ? 'Pública' : 'Privada' }}
                        </span>
                    </div>
                    <div class="note-author">
                        @if($note->isAnonymous())
                            Por: <span class="anonymous">Usuário Anônimo</span>
                        @elseif($note->user)
                            Por: {{ $note->user->name }}
                        @else
                            Por: <span class="unknown">Usuário não encontrado</span>
                        @endif
                    </div>
                </div>
                <div class="note-actions">
                    @if(Auth::check() && $note->user_id === Auth::id())
                        <a href="{{ route('notes.edit', $note) }}" class="btn-edit">Editar</a>
                        <form action="{{ route('notes.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Excluir</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach

        @if(count($notes) === 0)
            <div class="empty-state">
                <div class="icon">📝</div>
                <p>Nenhuma nota encontrada.</p>
                @auth
                    <p>Crie sua primeira nota agora!</p>
                @else
                    <p>Crie uma nota pública ou faça login para acessar notas privadas!</p>
                @endauth
            </div>
        @endif
    </div>
</div>

<style>
.notes-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

h1 {
    font-size: 28px;
    margin: 0;
}

.btn-create {
    display: inline-flex;
    align-items: center;
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.btn-create .icon {
    margin-right: 5px;
}

.search-container {
    margin-bottom: 20px;
}

.search-form {
    display: flex;
    align-items: center;
}

.search-input-wrapper {
    flex: 1;
    position: relative;
}

input[type="text"] {
    width: 100%;
    padding: 10px 40px 10px 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.search-button {
    position: absolute;
    right: 5px;
    top: 5px;
    background: none;
    border: none;
    cursor: pointer;
}

.clear-search {
    margin-left: 10px;
    color: #007bff;
    text-decoration: none;
}

.notes-list {
    margin-top: 20px;
}

.note-card {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.public-note {
    border-left: 5px solid #28a745;
}

.private-note {
    border-left: 5px solid #dc3545;
}

.note-content {
    flex: 1;
}

.note-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.note-title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    text-decoration: none;
}

.visibility-badge {
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
}

.visibility-badge.public {
    background-color: #28a745;
    color: white;
}

.visibility-badge.private {
    background-color: #dc3545;
    color: white;
}

.note-author {
    margin-top: 5px;
    font-size: 14px;
    color: #666;
}

.note-author .anonymous {
    color: #6c757d;
    font-style: italic;
}

.note-author .unknown {
    color: #dc3545;
    font-style: italic;
}

.note-actions {
    display: flex;
    gap: 10px;
}

.btn-edit,
.btn-delete {
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-edit {
    background-color: #007bff;
    color: white;
}

.btn-delete {
    background-color: #dc3545;
    color: white;
}

.empty-state {
    text-align: center;
    padding: 50px 0;
    color: #999;
}

.empty-state .icon {
    font-size: 50px;
    margin-bottom: 10px;
}
</style>
@endsection
