@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('users.store') }}" method="post">
    @csrf
    Digite um nome: <br> <input type="text" name="firstname">

    Digite um nome: <br> <input type="text" name="lastname">

    Digite um Email: <br> <input type="email" name="email">
    <br>
    Digite uma Senha: <br> <input type="password" name="password">
    <br>
    @if ($mensagem = Session::get('erro'))
        {{ $mensagem }}
    @endif
    <br>

    <button type="submit">Cadastrar</button>
</form>
