<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Listino</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Edit Listino</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('listinos.update', $listino->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Costo</label>
                                <input type="text" name="costo" value="{{ old('costo', $listino->costo) }}"
                                    class="form-control @error('costo') is-invalid @enderror" required>
                                @error('costo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Prezzo Vendita</label>
                                <input type="text" name="prezzo_vendita"
                                    value="{{ old('prezzo_vendita', $listino->prezzo_vendita) }}"
                                    class="form-control @error('prezzo_vendita') is-invalid @enderror" required>
                                @error('prezzo_vendita')
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
