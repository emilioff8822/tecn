<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Servizi</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Edit Servizi</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('servizis.update', $servizi->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Nome Servizio</label>
                                <input type="text" name="nome_servizio"
                                    value="{{ old('nome_servizio', $servizi->nome_servizio) }}"
                                    class="form-control @error('nome_servizio') is-invalid @enderror" required>
                                @error('nome_servizio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Descrizione</label>
                                <textarea class="form-control @error('descrizione') is-invalid @enderror" name="descrizione" required>{{ old('descrizione', $servizi->descrizione) }}</textarea>
                                @error('descrizione')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
