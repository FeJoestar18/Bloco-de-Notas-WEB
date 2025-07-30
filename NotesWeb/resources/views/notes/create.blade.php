@extends('layouts.app')

@section('content')
<div class="create-container">
    <div class="header">
        <h1>Nova Nota</h1>
        <a href="{{ route('notes.index') }}" class="btn-back">
            <span class="icon">←</span> Voltar
        </a>
    </div>

    @guest
        <div class="guest-info">
            <div class="info-box">
                <span class="info-icon">ℹ️</span>
                <div class="info-content">
                    <strong>Criando como visitante</strong>
                    <p>Você está criando uma nota pública. Para criar notas privadas, <a href="{{ route('login') }}">faça login</a> ou <a href="{{ route('register') }}">cadastre-se</a>.</p>
                </div>
            </div>
        </div>
    @endguest

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

            @auth
                <div class="form-group visibility-toggle">
                    <label class="visibility-label">
                        <input type="checkbox" name="is_public" id="is_public" value="1">
                        <span class="visibility-text">Tornar esta nota pública</span>
                        <span class="visibility-description">Notas públicas podem ser vistas por todos os usuários</span>
                    </label>
                </div>
            @else
                <div class="form-group visibility-info">
                    <div class="public-note-indicator">
                        <span class="public-icon">🌐</span>
                        <span class="public-text">Esta nota será criada como pública</span>
                    </div>
                    <input type="hidden" name="is_public" value="1">
                </div>
            @endauth

            <div class="form-actions">
                <button type="submit" class="btn-save">
                    <span class="icon">✓</span> Salvar Nota
                </button>
            </div>
        </form>
    </div>
</div>

<style>
.guest-info {
    margin-bottom: 20px;
}

.info-box {
    display: flex;
    align-items: flex-start;
    background-color: #e7f3ff;
    border: 1px solid #b3d9ff;
    border-radius: 8px;
    padding: 15px;
}

.info-icon {
    font-size: 20px;
    margin-right: 12px;
    margin-top: 2px;
}

.info-content {
    flex: 1;
}

.info-content strong {
    color: #0066cc;
    display: block;
    margin-bottom: 5px;
}

.info-content p {
    margin: 0;
    color: #333;
    font-size: 14px;
}

.info-content a {
    color: #e60000;
    text-decoration: none;
    font-weight: 500;
}

.info-content a:hover {
    text-decoration: underline;
}

.visibility-info {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    padding: 15px;
}

.public-note-indicator {
    display: flex;
    align-items: center;
}

.public-icon {
    font-size: 18px;
    margin-right: 10px;
}

.public-text {
    color: #28a745;
    font-weight: 500;
}

.visibility-toggle {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    padding: 15px;
}

.visibility-label {
    display: flex;
    flex-direction: column;
    cursor: pointer;
}

.visibility-text {
    font-weight: 500;
    margin-bottom: 5px;
}

.visibility-description {
    font-size: 14px;
    color: #666;
}
</style>
@endsection
