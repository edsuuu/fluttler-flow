@extends('layout.layout')

@section('title', 'Home page')

@section('conteudo')

    <h1>Pagina principal</h1>
    <a href="{{ route('login') }}">Fazer login</a>
    <a href="{{ route('admin.dashboard') }}">Dashboard privado</a>
    {{ isset($user) ? 'existe um usuario ' : 'não existe' }}

    <br>

    {{ $teste ?? 'variavel nao existe' }}

    <br>

    @if (!$user == 'nome')
        true
    @else
        false
    @endunless
    <br>
    @auth
        está autenticado
    @endauth
    <br>
    @guest
        não está autenticado
    @endguest

    {{-- estrutura de repeticao  --}}

    @for ($i = 0; $i <= 10; $i++)
        <br> valor {{ $i }}<br>
    @endfor


    @forelse ($frutas as $fruta)
        {{ $fruta }}
    @empty
        array Vazio
    @endforelse

@endsection
