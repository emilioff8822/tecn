<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco Listini</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container p-5">
        <h2 class="fs-4 text-secondary my-4">Elenco Listini</h2>

        <!-- Mostra il messaggio di notifica se esiste -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nome Servizio</th>
                    <th scope="col">Nome Point</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Prezzo Vendita</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listinos as $listino)
                    <tr>
                        <td>{{ $listino->id }}</td>
                        <td>{{ $listino->servizi->nome_servizio }}</td>
                        <td>{{ $listino->point->nome }}</td>
                        <td>{{ $listino->costo }}</td>
                        <td>{{ $listino->prezzo_vendita }}</td>
                        <td>
                            <a href="{{ route('listinos.show', $listino->id) }}" class="btn btn-primary">Vai</a>
                            <a href="{{ route('listinos.edit', $listino->id) }}" class="btn btn-success">Modifica</a>
                            <form action="{{ route('listinos.destroy', $listino->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Vuoi eliminare questo listino?')">Cancella</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Per la paginazione -->
        <div>
            {{ $listinos->links() }}
        </div>
    </div>
</body>

</html>
