<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco Servizi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container p-5">
        <h2 class="fs-4 text-secondary my-4">Elenco Servizi</h2>

        <!-- Mostra il messaggio di notifica se esiste -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- Aggiungi il bottone "Crea Nuovo Servizio" -->
        <a href="{{ route('servizis.create') }}" class="btn btn-warning mb-3">Crea Nuovo Servizio</a>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nome Servizio</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servizis as $servizio)
                    <tr>
                        <td>{{ $servizio->id }}</td>
                        <td>{{ $servizio->nome_servizio }}</td>
                        <td>{{ $servizio->descrizione }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('servizis.show', $servizio->id) }}"
                                    class="btn btn-primary mr-2">Vai</a>
                                <a href="{{ route('servizis.edit', $servizio->id) }}"
                                    class="btn btn-success mr-2">Modifica</a>
                                <form action="{{ route('servizis.destroy', $servizio->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Vuoi eliminare {{ $servizio->nome_servizio }}?')">Cancella</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Per la paginazione -->
        <div>
            {{ $servizis->links() }}
        </div>
    </div>
</body>

</html>
