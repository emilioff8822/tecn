<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listino Details</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>{{ $listino->servizi->nome_servizio }}</h3>
                    </div>
                    <div class="card-body">
                        <p>{{ $listino->servizi->descrizione }}</p>
                        <p>Costo: {{ $listino->costo }}</p>
                        <p>Prezzo di Vendita: {{ $listino->prezzo_vendita }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('listinos.index') }}" class="btn btn-primary">Back to list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
