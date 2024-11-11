<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data->name }}</title>
</head>
<body>
    <h1>{{ $data->name }}</h1>
    <p>{{ $data->description }}</p>
    <p>Status: {{ $data->status }}</p>
    <p>Created At: {{ $data->created_at }}</p>
    <p>Updated At: {{ $data->updated_at }}</p>

    <h2>Items:</h2>
    <ul>
        @foreach ($data->items as $item)


        <li>{{ $item['name'] }} - ${{ $item['price'] }}</li>

        @dd($data)
        @endforeach
    </ul>

    <div>
        <button>
            Teste de alerta
        </button>

        <button onclick="window.location.href='{{ url('/') }}'">Voltar para a Home</button>

    </div>

</body>
</html>
