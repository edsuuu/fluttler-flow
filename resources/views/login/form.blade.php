@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('login.auth') }}" method="post">
    @csrf

    Email: <br> <input type="email" name="email">
    <br>
    Senha: <br> <input type="password" name="password">
    <br>
    @if ($mensagem = Session::get('erro'))
        {{ $mensagem }}
    @endif
    <br>
    <input type="checkbox" name="remember"> Lembrar me
    <button type="submit">Login</button>
</form>
