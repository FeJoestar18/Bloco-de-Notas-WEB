@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-header">
        <h1>Cadastro</h1>
    </div>

    <div class="auth-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nome</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirmar Senha</label>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-footer">
                <button type="submit" class="btn">
                    Cadastrar
                </button>
            </div>

            <div class="auth-links" style="transform: translateX(15%);">
                <a href="{{ route('login') }}">
                    Já tem uma conta? Faça login
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
