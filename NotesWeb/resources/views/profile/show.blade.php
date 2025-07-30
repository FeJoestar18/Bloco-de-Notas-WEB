@extends('layouts.app')

@section('content')
<div class="profile-container">
    <div class="profile-header">
        <h1>Meu Perfil</h1>
        <a href="{{ route('profile.edit') }}" class="btn-edit-profile">
            <span class="icon">✏️</span> Editar Perfil
        </a>
    </div>

    <div class="profile-card">
        <div class="profile-info">
            <div class="profile-avatar">
                <span class="avatar-initial">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
            </div>

            <div class="profile-details">
                <div class="detail-item">
                    <label>Nome:</label>
                    <span class="detail-value">{{ $user->name }}</span>
                </div>

                <div class="detail-item">
                    <label>E-mail:</label>
                    <span class="detail-value">{{ $user->email }}</span>
                </div>

                <div class="detail-item">
                    <label>Membro desde:</label>
                    <span class="detail-value">{{ $user->created_at->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>

        <div class="profile-stats">
            <div class="stat-item">
                <span class="stat-number">{{ $user->notes()->count() }}</span>
                <span class="stat-label">Total de Notas</span>
            </div>

            <div class="stat-item">
                <span class="stat-number">{{ $user->notes()->where('is_public', true)->count() }}</span>
                <span class="stat-label">Notas Públicas</span>
            </div>

            <div class="stat-item">
                <span class="stat-number">{{ $user->notes()->where('is_public', false)->count() }}</span>
                <span class="stat-label">Notas Privadas</span>
            </div>
        </div>
    </div>
</div>

<style>
.profile-container {
    max-width: 800px;
    margin: 30px auto;
    padding: 20px;
}

.profile-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    border-bottom: 3px solid #e60000;
    padding-bottom: 15px;
}

.profile-header h1 {
    margin: 0;
    color: #333;
    font-size: 28px;
}

.btn-edit-profile {
    display: inline-flex;
    align-items: center;
    padding: 10px 20px;
    background-color: #e60000;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-weight: 500;
    transition: background-color 0.3s;
}

.btn-edit-profile:hover {
    background-color: #cc0000;
}

.btn-edit-profile .icon {
    margin-right: 8px;
}

.profile-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    padding: 30px;
}

.profile-info {
    display: flex;
    align-items: center;
    margin-bottom: 30px;
}

.profile-avatar {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #e60000, #ff3333);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 30px;
}

.avatar-initial {
    color: white;
    font-size: 32px;
    font-weight: bold;
}

.profile-details {
    flex: 1;
}

.detail-item {
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}

.detail-item label {
    font-weight: 600;
    color: #555;
    width: 120px;
    margin-right: 15px;
}

.detail-value {
    color: #333;
    font-size: 16px;
}

.profile-stats {
    display: flex;
    justify-content: space-around;
    background-color: #f8f9fa;
    border-radius: 8px;
    padding: 20px;
    border-top: 3px solid #e60000;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 24px;
    font-weight: bold;
    color: #e60000;
    margin-bottom: 5px;
}

.stat-label {
    color: #666;
    font-size: 14px;
    font-weight: 500;
}

@media (max-width: 768px) {
    .profile-info {
        flex-direction: column;
        text-align: center;
    }

    .profile-avatar {
        margin-right: 0;
        margin-bottom: 20px;
    }

    .detail-item {
        flex-direction: column;
        text-align: center;
    }

    .detail-item label {
        width: auto;
        margin-right: 0;
        margin-bottom: 5px;
    }

    .profile-stats {
        flex-direction: column;
        gap: 15px;
    }
}
</style>
@endsection
