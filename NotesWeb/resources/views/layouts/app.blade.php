<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloco de Notas</title>
    <link rel="stylesheet" href="{{ asset('css/layouts/topbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/notes/create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/notes/edit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/notes/index.css') }}">
</head>
<body>
<div class="topbar">
    <div class="logo">📝 Bloco de Notas</div>
    <a href="{{ route('home') }}">Início</a>
    <a href="{{ route('notes.index') }}">Ver Notas</a>
    <a href="{{ route('notes.create') }}">Criar Nota</a>
{{--    <a href="#">Minhas Notas</a>--}}
{{--    <a href="#">Cadastrar</a>--}}
</div>
@yield('content')
</body>
</html>
