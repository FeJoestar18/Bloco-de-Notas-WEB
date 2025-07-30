@extends('layouts.app')

@section('content')
<div class="create-container">
    <div class="header">
        <h1>Nova Nota</h1>
        <a href="{{ route('notes.index') }}" class="btn-back">
            <span class="icon">←</span> Voltar
        </a>
    </div>

    <div class="form-card">
        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" id="title" name="title" required placeholder="Digite o título da sua nota">
            </div>

            <div class="form-group">
                <label for="content">Conteúdo</label>
                <textarea id="content" name="content" required placeholder="Escreva o conteúdo da sua nota aqui..."></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-save">
                    <span class="icon">✓</span> Salvar Nota
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
