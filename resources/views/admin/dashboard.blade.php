<div>
    <h1>dashboard</h1>
    <p>{{ auth()->user()->firstname }}</p>
    <p>{{ auth()->user()->email }}</p>

    <a href="{{ route('login.logout') }}">Sair</a>
</div>
