@extends('layout.layout')

@section('title', 'Home page')

@section('conteudo')
    <div class="bg-gray-500 ">
        <h1>Pagina principal</h1>
    </div>

    <div>
        <a href="{{ route('login') }}" class="text-blue-700 ">Fazer login</a>
    </div>
    <div class="">
        <a href="{{ route('admin.dashboard') }}" class="text-blue-700">Dashboard privado</a>
    </div>
    <br>
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

    <div class="text-center">
        <button id="btn-mensal" onclick="alterarPlano('mensal')">Mensal</button>
        <button id="btn-semestral" onclick="alterarPlano('semestral')">Semestral</button>
        <button id="btn-anual" onclick="alterarPlano('anual')">Anual</button>
    </div>

    <div class="plans-container">
        @foreach ($planos as $plano)
            <div class="card-plan">
                <h3>{{ $plano['nome'] }}</h3>
                <p id="preco-{{ $plano['id'] }}" class="price"
                   data-mensal="{{ $plano['mensal'] }}"
                   data-semestral="{{ $plano['semestral'] }}"
                   data-anual="{{ $plano['anual'] }}">
                    R$ {{ number_format($plano['mensal'], 2, ',', '.') }}
                </p>
            </div>
        @endforeach
    </div>

    <script>
        function alterarPlano(tipo) {

            const precos = document.querySelectorAll('.price');

            precos.forEach(preco => {
                if (tipo === 'mensal') {
                    preco.textContent = 'R$ ' + parseFloat(preco.getAttribute('data-mensal')).toFixed(2).replace('.', ',');
                } else if (tipo === 'semestral') {
                    preco.textContent = 'R$ ' + parseFloat(preco.getAttribute('data-semestral')).toFixed(2).replace('.', ',');
                } else if (tipo === 'anual') {
                    preco.textContent = 'R$ ' + parseFloat(preco.getAttribute('data-anual')).toFixed(2).replace('.', ',');
                }
            });
        }
    </script>

@endsection
