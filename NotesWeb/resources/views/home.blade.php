@extends('layouts.app')

@section('content')
<div class="home-container">
    <div class="hero-section">
        <div class="hero-content">
            <h1>Bloco de Notas Digital</h1>
            <p class="subtitle">Organize suas ideias, tarefas e lembranças em um só lugar.</p>
            <div class="hero-buttons">
                <a href="{{ route('notes.create') }}" class="btn-primary">
                    <span class="icon">✏️</span> Criar Nova Nota
                </a>
                <a href="{{ route('notes.index') }}" class="btn-secondary">
                    <span class="icon">📋</span> Ver Minhas Notas
                </a>
            </div>
        </div>
        <div class="hero-image">
            <div class="notes-illustration">
                <div class="note-stack note-1">📝</div>
                <div class="note-stack note-2">📌</div>
                <div class="note-stack note-3">✓</div>
            </div>
        </div>
    </div>

    <div class="features-section">
        <h2>Recursos do Aplicativo</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📝</div>
                <h3>Notas Simples</h3>
                <p>Crie notas de texto de forma rápida e fácil, sem complicações.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔍</div>
                <h3>Organização</h3>
                <p>Mantenha todas as suas informações organizadas em um só lugar.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💻</div>
                <h3>Acesso Online</h3>
                <p>Acesse suas notas de qualquer dispositivo com conexão à internet.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Segurança</h3>
                <p>Suas notas ficam protegidas em nosso banco de dados seguro.</p>
            </div>
        </div>
    </div>

    <div class="about-section">
        <div class="about-content">
            <h2>Sobre o Projeto</h2>
            <p>O <strong>Bloco de Notas Digital</strong> é um projeto desenvolvido com Laravel para oferecer uma solução simples e eficiente para armazenar suas notas online. Este aplicativo web permite que você crie, visualize, edite e exclua notas de qualquer lugar, mantendo todas as suas ideias organizadas.</p>
            <p>Este projeto foi desenvolvido como uma demonstração de habilidades em desenvolvimento web utilizando o framework Laravel, com foco em criar uma interface de usuário moderna e responsiva.</p>
            <div class="tech-stack">
                <h3>Tecnologias utilizadas:</h3>
                <div class="tech-badges">
                    <span class="tech-badge">Laravel</span>
                    <span class="tech-badge">PHP</span>
                    <span class="tech-badge">HTML5</span>
                    <span class="tech-badge">CSS3</span>
                    <span class="tech-badge">SQLite</span>
                </div>
            </div>
        </div>
    </div>

    <div class="cta-section">
        <h2>Comece a usar agora mesmo</h2>
        <p>Organize suas ideias em um só lugar e acesse de qualquer dispositivo.</p>
        <a href="{{ route('notes.create') }}" class="btn-primary">Criar Minha Primeira Nota</a>
    </div>
</div>
@endsection
