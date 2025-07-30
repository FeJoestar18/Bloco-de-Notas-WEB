@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-header">
        <h1>Login</h1>
    </div>

    <div class="auth-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">E-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="remember-me">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Lembrar de mim</label>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn">
                    Entrar
                </button>
            </div>

            <div class="auth-links">
                <a href="{{ route('register') }}">
                    Não tem uma conta? Cadastre-se
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
