<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
    <h1>home user</h1>
    <h1>usuario autenticado no momento {{ auth()->user()->firstname }}</h1>

    @foreach ($usuarios as $user)
        <li class="text-xs">{{ $user->firstname }} {{ $user->lastname }} - {{ $user->email }}</li>
    @endforeach


    <div class="flex flex-row">
        {{ $usuarios->links('custom.pagination') }}
    </div>

</div>
