@extends('layouts.app')

@section('content')
<div class="show-container">
    <div class="header">
        <h1>{{ $note->title }}</h1>
        <div class="header-buttons">
            <a href="{{ route('notes.index') }}" class="btn-back">
                <span class="icon">←</span> Voltar
            </a>
            @if(Auth::check() && $note->user_id === Auth::id())
                <a href="{{ route('notes.edit', $note) }}" class="btn-edit">Editar</a>
            @endif
        </div>
    </div>

    <div class="note-details">
        <div class="note-meta">
            <span class="visibility-badge {{ $note->is_public ? 'public' : 'private' }}">
                {{ $note->is_public ? 'Nota Pública' : 'Nota Privada' }}
            </span>
            @if($note->user)
                <span class="note-author">Por: {{ $note->user->name }}</span>
            @endif
            <span class="note-date">Criada em: {{ $note->created_at->format('d/m/Y H:i') }}</span>
            @if($note->updated_at != $note->created_at)
                <span class="note-date">Atualizada em: {{ $note->updated_at->format('d/m/Y H:i') }}</span>
            @endif
        </div>

        <div class="note-content">
            {!! nl2br(e($note->content)) !!}
        </div>

        @if(Auth::check() && $note->user_id === Auth::id())
            <div class="note-actions">
                <form action="{{ route('notes.destroy', $note) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Excluir Nota</button>
                </form>
            </div>
        @endif
    </div>
</div>

<style>
.show-container {
    max-width: 800px;
    margin: 30px auto;
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    border-bottom: 1px solid #eee;
    padding-bottom: 15px;
}

.header h1 {
    margin: 0;
    color: #333;
    font-size: 28px;
}

.header-buttons {
    display: flex;
    gap: 10px;
}

.btn-back, .btn-edit {
    display: inline-flex;
    align-items: center;
    padding: 8px 15px;
    text-decoration: none;
    border-radius: 4px;
}

.btn-back {
    background-color: #f0f0f0;
    color: #333;
}

.btn-edit {
    background-color: #007bff;
    color: white;
}

.note-details {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    padding: 25px;
}

.note-meta {
    margin-bottom: 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    align-items: center;
    font-size: 14px;
    color: #666;
}

.visibility-badge {
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: bold;
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
    font-weight: 500;
}

.note-content {
    font-size: 16px;
    line-height: 1.6;
    color: #333;
    white-space: pre-wrap;
    margin-bottom: 30px;
}

.note-actions {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #eee;
    text-align: right;
}

.btn-delete {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.btn-delete:hover {
    background-color: #c82333;
}
</style>
@endsection
