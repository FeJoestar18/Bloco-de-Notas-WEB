@extends('layouts.app')

@section('content')
<div class="edit-container">
    <div class="header">
        <h1>Editar Nota</h1>
        <a href="{{ route('notes.index') }}" class="btn-back">
            <span class="icon">←</span> Voltar
        </a>
    </div>

    <div class="form-card">
        <form action="{{ route('notes.update', $note) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" id="title" name="title" value="{{ $note->title }}" required placeholder="Digite o título da sua nota">
            </div>

            <div class="form-group">
                <label for="content">Conteúdo</label>
                <textarea id="content" name="content" required placeholder="Escreva o conteúdo da sua nota aqui...">{{ $note->content }}</textarea>
            </div>

            <div class="form-group visibility-toggle">
                <label class="visibility-label">
                    <input type="checkbox" name="is_public" id="is_public" value="1" {{ $note->is_public ? 'checked' : '' }}>
                    <span class="visibility-text">Tornar esta nota pública</span>
                    <span class="visibility-description">Notas públicas podem ser vistas por todos os usuários</span>
                </label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-update">
                    <span class="icon">✓</span> Atualizar Nota
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
