@extends('layouts.app')

@section('content')
<div class="profile-edit-container">
    <div class="header">
        <h1>Editar Perfil</h1>
        <a href="{{ route('profile.show') }}" class="btn-back">
            <span class="icon">←</span> Voltar ao Perfil
        </a>
    </div>

    <div class="edit-forms">
        <div class="form-section">
            <h2>Informações Pessoais</h2>
            <form action="{{ route('profile.update') }}" method="POST" class="profile-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-save">
                        <span class="icon">✓</span> Salvar Alterações
                    </button>
                </div>
            </form>
        </div>

        <div class="form-section">
            <h2>Alterar Senha</h2>
            <form action="{{ route('profile.updatePassword') }}" method="POST" class="password-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="current_password">Senha Atual</label>
                    <input type="password" id="current_password" name="current_password" required>
                    @error('current_password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Nova Senha</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar Nova Senha</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-save-password">
                        <span class="icon">🔒</span> Alterar Senha
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.profile-edit-container {
    max-width: 900px;
    margin: 30px auto;
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    border-bottom: 3px solid #e60000;
    padding-bottom: 15px;
}

.header h1 {
    margin: 0;
    color: #333;
    font-size: 28px;
}

.btn-back {
    display: inline-flex;
    align-items: center;
    padding: 10px 15px;
    background-color: #f0f0f0;
    color: #333;
    text-decoration: none;
    border-radius: 6px;
    font-weight: 500;
    transition: background-color 0.3s;
}

.btn-back:hover {
    background-color: #e0e0e0;
}

.btn-back .icon {
    margin-right: 8px;
}

.edit-forms {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.form-section {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    padding: 25px;
    border-top: 4px solid #e60000;
}

.form-section h2 {
    margin: 0 0 20px 0;
    color: #333;
    font-size: 20px;
    font-weight: 600;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #555;
}

.form-group input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 16px;
    transition: border-color 0.3s, box-shadow 0.3s;
    box-sizing: border-box;
}

.form-group input:focus {
    border-color: #e60000;
    outline: none;
    box-shadow: 0 0 0 3px rgba(230, 0, 0, 0.1);
}

.error-message {
    color: #e60000;
    font-size: 14px;
    margin-top: 5px;
    display: block;
}

.form-actions {
    margin-top: 25px;
}

.btn-save,
.btn-save-password {
    display: inline-flex;
    align-items: center;
    padding: 12px 20px;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
    width: 100%;
    justify-content: center;
}

.btn-save {
    background-color: #e60000;
    color: white;
}

.btn-save:hover {
    background-color: #cc0000;
    transform: translateY(-2px);
}

.btn-save-password {
    background-color: #28a745;
    color: white;
}

.btn-save-password:hover {
    background-color: #218838;
    transform: translateY(-2px);
}

.btn-save .icon,
.btn-save-password .icon {
    margin-right: 8px;
}

@media (max-width: 768px) {
    .edit-forms {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .profile-edit-container {
        padding: 15px;
    }

    .header {
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }
}
</style>
@endsection
